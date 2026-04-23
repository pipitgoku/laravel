<?php 
if (! function_exists('comCodeOptions')) {
    function comCodeOptions($id){
        $comCodeList = App\Models\ComCode::where('code_group', $id)
                    ->orderBy('com_cd')
                    ->get();

        $options='<option value="">Pilih Data</option>';

        foreach($comCodeList as $item){
            $options .='<option value="'.$item->com_cd.'">'.$item->code_nm.'</option>';
        }

        return $options;
    }
}

if (! function_exists('comCodeName')) {
    function comCodeName($id){
        $comCodeName = App\Models\ComCode::where('com_cd', $id)->first();
        return $comCodeList->code_nm;
    }
}

if (! function_exists('comCodeValue')) {
    function comCodeValue($id){
        $comCodeValue = App\Models\ComCode::where('com_cds', $id)->first();
        return $comCodeValue->code_value;
    }
}

if (! function_exists('comCodeByValue')) {
    function comCodeByValue($id){
        $comCodeValue = App\Models\ComCode::where('code_value', $id)->first();
        return $comCodeValue->com_cd;
    }
}