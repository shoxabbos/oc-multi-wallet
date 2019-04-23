<?php namespace Shohabbos\Multiwallet\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Shohabbos\Multiwallet\Models\Balance;

class RbcUpdateBalance extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'shohabbos:rbcupdatebalance';

    /**
     * @var string The console command description.
     */
    protected $description = 'Does update users balance.';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $data = bitcoind()->listaccounts()->get();

        $users = [];
        foreach ($data as $key => $value) {
            
            if (!$value) continue;

            preg_match('/^rubcoin-web-(\d*)$/m', $key, $matches);
            $userId = isset($matches[1]) ? $matches[1] : null;

            if (is_numeric($userId)) {
                
                Balance::where('user_id', $userId)
                    ->where('currency', 'rbc')
                    ->update(['balance' => $value]);
            }
        }



        
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}