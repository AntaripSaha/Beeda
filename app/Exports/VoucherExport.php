<?php

namespace App\Exports;

use App\Models\Voucher;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use Maatwebsite\Excel\Concerns\WithDrawings;

class VoucherExport implements FromView, WithHeadings
{
    public $batch_id;
    public function __construct(int $batchId)
    {
        $this->batch_id = $batchId;
    }

    public function view(): View
    {
        $vouchers = Voucher::where('batch_id', $this->batch_id)->get();
        $data = [];
        foreach ($vouchers as $index => $voucher) {

            $d = new DNS1D();
            $image = str_replace(' ', '+', $d->getBarcodePNG($voucher->activation_key, env('BARCODE_ENCODING') ? env('BARCODE_ENCODING') : 'EAN13' ));
            $imageName = rand(10000000, 99999999) . '.' . 'png';
            $basePath = env('APP_ENV')=='production' ? str_replace('/src/public','',public_path()) : public_path();
            \File::put($basePath . '/test' . '/' . $imageName, base64_decode($image));
            $path = $basePath . '/test' . '/' . $imageName;
            $temp = [
                'sl' => $index + 1,
                'voucher_no' => $voucher->voucher_no,
                'scratch_code' => base64_decode($voucher->secret_code),
                'barcode' => $voucher->activation_key,
                'path' => $path
            ];
            array_push($data, $temp);
        }
        return view('superadmin.export.voucher', compact('data'));
    }

    public function headings(): array
    {
        return ["SL", "Voucher No", "Scratch Code", "Activation Key"];
    }
}
