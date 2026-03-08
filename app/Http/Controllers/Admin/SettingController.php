<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.setting.index', compact('settings'));
    }

    public function update(Request $request)
    {
        // Xử lý các trường text bình thường
        $textFields = ['brand_name', 'company_name', 'address', 'email',
                       'messenger_link', 'meta_title', 'meta_description', 'meta_keywords',
                       'og_title', 'og_description', 'facebook_url', 'zalo_url', 'google_analytics',
                       'fanpage_iframe', 'map_iframe'];

        foreach ($textFields as $field) {
            if ($request->has($field)) {
                Setting::updateOrCreate(['key' => $field], ['value' => $request->input($field)]);
            }
        }

        // Xử lý danh sách số điện thoại
        $phonesNumbers = $request->input('phones_number', []);
        $phonesLabels  = $request->input('phones_label', []);
        $phonesList = [];
        foreach ($phonesNumbers as $idx => $number) {
            $num = trim($number);
            if ($num !== '') {
                $phonesList[] = [
                    'number' => $num,
                    'label'  => trim($phonesLabels[$idx] ?? ''),
                ];
            }
        }
        if (!empty($phonesList)) {
            // Lưu JSON vào key 'phones'
            Setting::updateOrCreate(['key' => 'phones'], ['value' => json_encode($phonesList)]);
            // Lưu số đầu tiên vào 'phone' (backward compatible)
            Setting::updateOrCreate(['key' => 'phone'], ['value' => $phonesList[0]['number']]);
        }

        // Xử lý upload Favicon
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $ext = $file->getClientOriginalExtension();
            $fileName = 'favicon.' . $ext;
            // Xóa favicon cũ nếu có
            $oldFavicon = Setting::where('key', 'favicon')->first();
            if ($oldFavicon && $oldFavicon->value && File::exists(public_path('images/seo/' . $oldFavicon->value))) {
                File::delete(public_path('images/seo/' . $oldFavicon->value));
            }
            if (!File::isDirectory(public_path('images/seo'))) {
                File::makeDirectory(public_path('images/seo'), 0755, true);
            }
            $file->move(public_path('images/seo'), $fileName);
            Setting::updateOrCreate(['key' => 'favicon'], ['value' => $fileName]);
        }

        // Xử lý Logo
        if ($request->input('remove_logo')) {
            // Xóa logo cũ
            $oldLogo = Setting::where('key', 'logo')->first();
            if ($oldLogo && $oldLogo->value && File::exists(public_path('images/seo/' . $oldLogo->value))) {
                File::delete(public_path('images/seo/' . $oldLogo->value));
            }
            Setting::updateOrCreate(['key' => 'logo'], ['value' => '']);
        } elseif ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            // Xóa logo cũ nếu có
            $oldLogo = Setting::where('key', 'logo')->first();
            if ($oldLogo && $oldLogo->value && File::exists(public_path('images/seo/' . $oldLogo->value))) {
                File::delete(public_path('images/seo/' . $oldLogo->value));
            }
            if (!File::isDirectory(public_path('images/seo'))) {
                File::makeDirectory(public_path('images/seo'), 0755, true);
            }
            $file->move(public_path('images/seo'), $logoName);
            Setting::updateOrCreate(['key' => 'logo'], ['value' => $logoName]);
        }

        // Xử lý upload OG Image
        if ($request->hasFile('og_image')) {
            $file = $request->file('og_image');
            $imageName = 'og_image_' . time() . '.' . $file->getClientOriginalExtension();
            $oldOg = Setting::where('key', 'og_image')->first();
            if ($oldOg && $oldOg->value && File::exists(public_path('images/seo/' . $oldOg->value))) {
                File::delete(public_path('images/seo/' . $oldOg->value));
            }
            if (!File::isDirectory(public_path('images/seo'))) {
                File::makeDirectory(public_path('images/seo'), 0755, true);
            }
            $file->move(public_path('images/seo'), $imageName);
            Setting::updateOrCreate(['key' => 'og_image'], ['value' => $imageName]);
        }

        return redirect()->back()->with('message', 'Cập nhật cài đặt thành công');
    }
}
