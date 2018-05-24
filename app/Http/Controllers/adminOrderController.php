<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
use Excel;
use App\Exports\InvoicesExport;
class adminOrderController extends Controller
{
    public function getAllOrderSuccess(){
        $data['order']=Order::where('status',1)->orderBy('id','desc')->get();
        return view('admin.order.order',$data);
    }
    public function getAllOrderWating(){
        $data['order']=Order::where('status',0)->orderBy('id','desc')->get();
        return view('admin.order.order_wating',$data);
    }
    //CHuyển trạng thái đơn hàng
    public function changeStatus($id){
        //Kiểm tra đơn hàng có tồn tại không?
        $order=Order::findOrFail($id);
        if($order->status==0){
            $order->status=1;
            $order->save();
            return redirect('admin/don-hang-chua-giao.html')->with('message',['status'=>'success','content'=>'Đơn hàng đã được chuyển sang mục chưa giao!!']);
            
        }else{
            $order->status=0;
            $order->save();
            return redirect('admin/danh-sach-don-hang.html')->with('message',['status'=>'success','content'=>'Đơn hàng đã được chuyển sang mục đã giao!!']);
        }
        
    }
    //Hủy đơn
    public function removeOrder($id){
        //Kiểm tra đơn hàng có tồn tại không?
        $order=Order::findOrFail($id);
        $order->status=3;
        $order->save();
        return redirect('admin/don-hang-chua-giao.html')->with('message',['status'=>'warning','content'=>'Hủy đơn hàng thành công, vui lòng liên hệ quản trị viên nếu muốn để khôi phục!!']);

    }
    //Xuất file exel
    public function exportExel(Request $request){
        if($request->has('category')){
            $category=$request->category;
            $start_date=$request->start_date;
            $end_date=$request->end_date;
            $order=Order::where('created_at','>=',$start_date);
            $order=$order->where('created_at','<=',$end_date);
            if($category!=-1){
                $order=$order->where('status',$category);
            }
            $order=$order->get();
            $header=[
                'STT',
                'MÃ ĐƠN HÀNG',
                'NGÀY ĐẶT',
                'HỌ TÊN',
                'NGÀY SINH',
                'SĐT',
                'TÊN NHÀ THUỐC',
                'ĐỊA CHỈ',
                'MÃ THUẾ',
                'TÊN SẢN PHẨM',
                'SỐ LƯỢNG',
                'ĐƠN GIÁ',
                'TỔNG TIỀN'
            ];
            $stt=1;
            $result=[];
            foreach($order as $k=>$v){
                $user_detail=$v->fk_user->fk_user_detail;
                $order_detail=OrderDetail::where('order_id',$v->id)->get();
                foreach($order_detail as $k_detail=>$v_detail){
                    $result[]=[
                        'STT'=>$stt,
                        'order_id'=>$v->id,
                        'created_at'=>date('d-m-Y',strtotime($v->created_at)),
                        'name'=>$user_detail->name,
                        'dob'=>date('d-m-Y',strtotime($user_detail->dob)),
                        'phone'=>$user_detail->phone,
                        'name_shop'=>$user_detail->name_shop,
                        'address'=>$user_detail->address,
                        'tax_code'=>$user_detail->tax_code,
                        'product_name'=>$v_detail->name,
                        'qty'=>$v_detail->qty,
                        'price'=>number_format($v_detail->price-$v_detail->sales),
                        'total'=>number_format(($v_detail->price-$v_detail->sales)*$v_detail->qty)
                    ];
                    $stt++;
                }
            }
            $collection = collect($result);
            //Xuất file exel
            return Excel::download(new InvoicesExport($collection,$header), 'Thống Kê.xlsx');
        }
        return view('admin.order.export_exel');
    }
    //Chi tiết đơn hàng
    public function detailOrder($id){
        $order=Order::findOrFail($id);
        //Lấy thông tin người dùng
        $user=$order->fk_user->fk_user_detail;
        $data['user']=$user;

        $order_detail=OrderDetail::where('order_id',$id)->get();
        $data['order_detail']=$order_detail;
        return view('admin.order.detail_order',$data);
    }
}
