<?php class WalletTransaction extends Model
{
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
