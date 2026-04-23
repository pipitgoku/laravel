<?php 
if (! function_exists('configuration')) {
    function configuration($id){
        $config = App\Models\AuthConfiguration::where('configuration_cd', $id);

        $config = $config->first();

        return $config->configuration_value;
    }
}
