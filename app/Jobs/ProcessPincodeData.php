<?php

namespace App\Jobs;

use Mail;
use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Pincode;

class ProcessPincodeData extends Job implements ShouldQueue {

    use SerializesModels;

    protected $udata;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct($data) {
        $this->udata = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {

        // $pincode = new Pincode();
        $pincode = new \stdClass();
        foreach ($this->udata as $pins) {
            $pins = explode(",", $pins);
            $pincode->officename = $pins[0];
            $pincode->pincode = $pins[1];
            $pincode->officeType = $pins[2];
            $pincode->Deliverystatus = $pins[3];
            $pincode->divisionname = $pins[4];
            $pincode->regionname = $pins[5];
            $pincode->circlename = $pins[6];
            $pincode->Taluk = $pins[7];
            $pincode->Districtname = $pins[8];
            $pincode->statename = $pins[9];

            /*    $pincode->save($pins); */
            Pincode::firstOrCreate((array) $pincode);
        }
    }

}
