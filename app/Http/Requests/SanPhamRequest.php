<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ma_san_pham' => 'required|max:10|unique:san_phams,ma_san_pham,' . $this->route('id'),
            'ten_san_pham' => 'required|max:255|',
            'hinh_anh' => 'image|mimes:jpg,jpeg,png,gif',
            'gia_san_pham' => 'required|numeric|min:0',
            'gia_khuyen_mai' => 'numeric|min:0|lt:gia_san_pham',
            'mo_ta_ngan' => 'max:255',         
            'so_luong' => 'integer|min:0',
            'ngay_nhap' => 'required|date',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'ma_san_pham.required' => 'Mã sản phẩm là buộc điền',
            'ma_san_pham.max' => 'Mã sản phẩm không được quá 10 ký tự',
            'ma_san_pham.unique' => 'Mã sản phẩm đã tồn tại',
            'ten_san_pham.required' => 'Tên sản phẩm là buộc điền',
            'ten_san_pham.max' => 'Tên sản phẩm không được quá 255 ký tự',
            'hinh_anh.image' => 'Hình ảnh không hợp lệ',
            'hinh_anh.mimes' => 'Hình ảnh không hợp lệ',
            'gia_san_pham.required' => 'Gía sản phẩm là buộc điền',
            'gia_san_pham.numeric' => 'Gía sản phẩm phải là số',
            'gia_san_pham.min' => 'Gía sản phẩm phải lớn hơn hoặc bằng 0',
            'gia_khuyen_mai.numeric' => 'Gía khuyến mãi phải là số',
            'gia_khuyen_mai.min' => 'Gía khuyến mãi phải lớn hơn hoặc bằng 0',
            'gia_khuyen_mai.lt' => 'Gía khuyến mãi phải nhỏ hơn giá sản phẩm',
            'mo_ta_ngan.max' => 'Mô tả ngắn không được quá 255 ký tự',         
            'so_luong.integer' => 'Số lượng phải là số',
            'so_luong.min:0' => 'Số lượng phải lớn hơn hoặc bằng 0',
            'ngay_nhap.required' => 'Ngày nhập là buộc điền',
            'ngay_nhap.date' => 'Ngày nhập sai đinh dạng',
            'danh_muc_id.required' => 'Danh mục là buộc điền',
            'danh_muc_id.exists' => 'Danh mục không hợp lệ',
        ];
    }
}
