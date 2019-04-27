<?php namespace Shohabbos\Multiwallet\Jobs;



class SendFrom
{
    public function fire($job, $data)
    {        

        $data = bitcoind()->sendfrom(
            'rubcoin-web-'.$data['account'],
            $data['address'],
            $data['amount'],
            1,
            $data['comment'],
        )->get();

        

    }

}