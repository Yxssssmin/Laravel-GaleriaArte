<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'cloud_account',
        'cloud_login_type',
        'cloud_password',
        'cloud_merchantId',
        'cloud_agencyId',
        'cloud_token',
    ];

    public function getToken()
    {
        $value = $this->where('name', 'cloud_token')->value('valor');
        return $value;
    }

    public function getCloudAgencyId()
    {
        $value = $this->where('name', 'cloud_agencyId')->value('valor');
        return (int)$value;
    }

    public function getCloudMerchantId() {
        $value = $this->where('name', 'cloud_merchantId')->value('valor');
        return (int)$value;
    }

    public function getCloudPassword() {
        $value = $this->where('name', 'cloud_password')->value('valor');
        return $value;
    }

    public function getCloudAccount() {
        $value = $this->where('name', 'cloud_account')->value('valor');
        return $value;
    }

    public function getCloudLogintype() {
        $value = $this->where('name', 'cloud_login_type')->value('valor');
        return (int)$value;
    }

    public function getCloudStoreId() {
        $value = $this->where('name', 'cloud_storeId')->value('valor');
        return (int)$value;
    }

    public function updateCloudPassword($token)
    {
        $setting = $this->where('name', 'cloud_password')->first();
        $setting->valor = $token;
        $setting->save();
    }

    public function updateToken($encryptedPasswd)
    {
        $setting = $this->where('name', 'cloud_token')->first();
        $setting->valor = $encryptedPasswd;
        $setting->save();
    }

    public function updateCloudMerchantId($merchantId)
    {
        $setting = $this->where('name', 'cloud_merchantId')->first();
        $setting->valor = $merchantId;
        $setting->save();
    }

    public function updateCloudAgencyId($agencyId)
    {
        $setting = $this->where('name', 'cloud_agencyId')->first();
        $setting->valor = $agencyId;
        $setting->save();
    }


}
