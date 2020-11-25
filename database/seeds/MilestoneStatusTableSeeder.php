<?php

use Illuminate\Database\Seeder;

class MilestoneStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      Schema::disableForeignKeyConstraints();
      DB::table('milestone_status')->truncate();

      $milestone_status = [
        [1, 'Processing', 'active', NULL, NULL, 0],
        [2, 'Block', 'block', NULL, NULL, 0],
        [3, 'Waiting', 'inactive', NULL, NULL, 0],
        [4, 'Completed', '', '2019-01-20 20:35:36', '2019-01-20 20:35:36', 0],
        [5, 'Payment Due', '', '2019-01-28 20:17:11', '2019-01-28 20:17:11', 0],
        [6, 'Created', '', '2019-02-11 18:37:45', '2019-02-11 18:37:45', 0],
        [7, 'Disputing', '', '2019-05-17 00:22:24', '2019-05-17 00:22:24', 0],
        [8, '239', '', '2019-07-09 07:11:15', '2019-07-09 07:11:15', 0],
        [9, 'Underway', '', '2019-08-05 07:40:41', '2019-08-05 07:40:41', 0],
        [20, 'Early Release', 'Early Release', '2019-08-05 07:40:41', '2019-08-05 07:40:41', 0],
        [10, '263', '', '2019-08-05 08:20:15', '2019-08-05 08:20:15', 0],

      ];

      foreach ($milestone_status as $value) {
        \App\Models\MilestoneStatus::insert([
          'id' => $value[0],
          'status' => $value[1],
          'description' => $value[2],
          'created_at' => $value[3],
          'updated_at' => $value[4],
          'default' => $value[5]
        ]);
      }
      Schema::enableForeignKeyConstraints();
    }
}
