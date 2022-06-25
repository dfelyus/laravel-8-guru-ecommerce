<?

namespace App\Providers;

use App\Models\Settings;

class Mydata
{

    public function settings()
    {
        $settings = Settings::where('setting_status', 1)->first()->get();
        return $settings;
    }
}
