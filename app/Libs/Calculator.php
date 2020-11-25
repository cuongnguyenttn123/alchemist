<?php
/**
 * Purpose: Reformat string
 * Using: \App\Libs\StringFormat
 */

namespace App\Libs;

use App\Models\BidStatus;
use DateTime;
use Illuminate\Support\Facades\DB;

class Calculator{


	public static function pointToLevel($diem_tong, $step = 10){
		$lv = 1;
		$diem = 0;
		$bn = $step;
		while($diem < $diem_tong){
		  $diem += $bn;
		  if($diem <= $diem_tong){
		    $lv++;
		  }
		  if($lv % 5 == 0){
		   $bn += $step;
		  }
		}
		return $lv;
	}
	public static function levelToPointMin($level_min, $level_max, $step = 10){
	    $point_min = $point_max = 0;
	    $lv = 1;
	    $bn = $step;
	    while($lv <= $level_max){
	      if($lv < $level_min){
	        $point_min += $bn;
	      }
	      $point_max += $bn;
	      $lv++;
	      if($lv % 5 == 0){
	        $bn += $step;
	      }
	    }
	    $point['min'] = $point_min;
	    $point['max'] = $point_max;
	    return $point;
	}

	public static function nextLevelPoint($point, $step=10){
		$lv = self::pointToLevel($point, $step);
	  	$bn = $step;
	  	$i = 1;
	  	$diem_tong = 0;
	  	while($i <= $lv){
		    if($i % 5 == 0){
		    	//sửa theo bước nhảy 30
		    	if($i== 30 && $step == 15){
 					$bn += 30;
		    	}else{
		    		$bn += $step;
		    	}
		    	//end
		    	//$bn += $step;
		    }
		    $diem_tong += $bn;
		    $i++;
	  	}
	  	return $diem_tong;
	}

	static function multplier($day){
	    if($day < 10){
	      return 0.5;
	    }else if($day < 20){
	      return 0.75;
	    }else if($day < 30){
	      return 1;
	    }else if($day < 90){
	      return 1.25;
	    }else if($day < 180){
	      return 1.5;
	    }else if($day < 365){
	      return 2;
	    }else{
	      return 3;
	    }
	}

	static function collection(){
    	$title_alchemist = ['Apprentice', 'Journeyman', 'Artisan', 'Warlock', 'Master', 'Grand Master'];
    	$title_seeker = ['Merchant 1','Merchant 2','Merchant 3','Merchant 4','Merchant 5','Merchant 6'];
		$array_title = [
        	0 => [
        		'min_level' => '1',
        		'max_level' => '15',
        		'min_rp' => '0',
        		'max_rp' => '500',
        		],
        	1 => [
        		'min_level' => '16',
        		'max_level' => '30',
        		'min_rp' => '501',
        		'max_rp' => '1500',
        		],
        	2 => [
        		'min_level' => '31',
        		'max_level' => '50',
        		'min_rp' => '1501',
        		'max_rp' => '5000',
        		],
        	3 => [
        		'min_level' => '51',
        		'max_level' => '75',
        		'min_rp' => '5001',
        		'max_rp' => '10000',
        		],
        	4 => [
        		'min_level' => '76',
        		'max_level' => '99',
        		'min_rp' => '10001',
        		'max_rp' => '15000',
        		],
        	5 => [
        		'min_level' => '100',
        		'max_level' => '1000',
        		'min_rp' => '15001',
        		'max_rp' => '1000000',
        		],
        ];
        $arr = [];
        foreach ($array_title as $key => $title){
	    	$title['name'] = $title_alchemist[$key];
	    	$title['type'] = 'alchemist';
	    	$arr[] = $title;
    	}
        foreach ($array_title as $key => $title){
	    	$title['name'] = $title_seeker[$key];
	    	$title['type'] = 'seeker';
	    	$arr[] = $title;
    	}
        $collection = collect($arr);
		return $collection;
	}
	static function Title($current_level, $type){
		$collection = self::collection();
		$title = $collection->where('min_level', '<=', $current_level)
                        ->where('max_level', '>=', $current_level)
                        ->where('type', '=', $type)
                        ->pluck('name')->first();
        return $title;
	}

	static function titleToLv($title){
	    switch ($title) {
	    	case 'Apprentice':
	    		return 1;
	    		break;
	    	case 'Journeyman':
	    		return 2;
	    		break;
	    	case 'Artisan':
	    		return 3;
	    		break;
	    	case 'Warlock':
	    		return 4;
	    		break;
	    	case 'Master':
	    		return 5;
	    		break;
	    	case 'Grand Master':
	    		return 5;
	    		break;

	    	default:
	    		return 1;
	    		break;
	    }
	}

	public static function criteriaPointEarn($title, $rate_star, $day, $bonus = true, $rating_value, $key){
		$lv = self::titleToLv($title);
	    $score = array(
	      array(-4, -1, 4, 7, 10),
	      array(-7, -3, 4, 8, 12),
	      array(-10, -5, 4, 9, 14),
	      array(-13, -7, 4, 10, 16),
	      array(-16, -9, 4, 12, 20)
	    );
	    $score_bonus = array(
	      array(-2, -1, 0, 1, 2),
	      array(-3, -2, 0, 2, 3),
	      array(-4, -3, 0, 3, 4),
	      array(-5, -4, 0, 4, 5),
	      array(-6, -5, 0, 5, 6)
	    );
	    $table_2 = Calculator::pointCalBasedOnPrevious($rate_star, $rating_value, $key);
	    if($bonus){
	    	$bonus_point = $score_bonus[$lv - 1][$table_2 - 1];
	    }
	    return round($score[$lv - 1][$rate_star - 1] * self::multplier($day) + $bonus_point, 1);
	}

  public static function acceptAwardBid($idUser){

	  $year = date("Y");
	  $month = date("m");
    $acceptAwardBid = DB::table('project')->where('_employer', $idUser)
      ->whereYear('created_at', '=', $year)
      ->where(function ($query) use ($month) {
        $query->whereMonth('created_at', '=', $month)->whereMonth('accept_time', '=', $month)
          ->orWhere(function($query) use ($month) {
            $query->whereMonth('created_at', '=', $month-1)
              ->whereMonth('accept_time', '=', $month);

        })
          ->orWhere(function($query) use ($month) {
            $query->whereMonth('created_at', '=', $month-2)
              ->whereMonth('accept_time', '=', $month);

          })
          ->get();
      })
      ->count();
    return $acceptAwardBid;
  }

  public static function calPlatform($user){
    $idUser = $user->id;
    $year = date("Y");
    $bid_status = BidStatus::firstOrCreate(['status' => 'accepted']);
    $bonus = $acceptAwardBid = DB::table('project')
      ->where('project._employer', $idUser)
      ->whereYear('accept_time', '=', $year)
      ->get();
    return self::calculateUserPlatform(count($bonus));
  }

  public static function totalAcceptAwardBid($idUser){

    $year = date("Y");
    $month = date("m");
    $totalAcceptAwardBid = DB::table('project')->where('_employer', $idUser)
      ->whereYear('created_at', '=', $year)
      ->where(function ($query) use ($month) {
        $query->whereMonth('created_at', '=', $month)
          ->orWhere(function($query) use ($month) {
            $query->whereMonth('created_at', '=', $month-1)
              ->where(function ($query) use ($month){
                $query->whereNull('accept_time')
                  ->orWhere(function($query) use ($month){
                    $query->whereMonth('accept_time', '=', $month);
                  });
              });

          })
          ->orWhere(function($query) use ($month) {
            $query->whereMonth('created_at', '=', $month-2)
              ->where(function ($query) use ($month){
                $query->whereNull('accept_time')
                  ->orWhere(function($query) use ($month){
                    $query->whereMonth('accept_time', '=', $month);
                  });
              });

          })
          ->get();
      })
      ->count();
    return $totalAcceptAwardBid;
  }

  public static function calculationBasedOnProjectAcceptAwardBid($user){
    $level = self::titleToLv($user->user_title);
    $percent_like = 0;
    $acceptAwardBid = self::acceptAwardBid($user->id);
    $totalAcceptAwardBid = self::totalAcceptAwardBid($user->id);
    if($acceptAwardBid > 0 && $totalAcceptAwardBid > 3){
      $percent_like = ($acceptAwardBid / $totalAcceptAwardBid) * 100;
    }
    $coefficient = array(
      array(-1, -1, -1, 0, 1 , 2),
      array(-1, -1, -1, 0, 1 , 2),
      array(-1, -1, -1, 0, 1 , 2),
      array(-1, -1, -1, 0, 1 , 2),
      array(-1, -1, -1, 0, 1 , 2),
    );
    $bonus = 0;
    if($level <= count($coefficient) && $totalAcceptAwardBid > 2){
      if($percent_like <= 20){
        $bonus = $coefficient[$level - 1][0];
      }else if($percent_like <= 35){
        $bonus = $coefficient[$level - 1][1];
      }else if($percent_like <= 50){
        $bonus = $coefficient[$level - 1][2];
      }else if($percent_like <= 70){
        $bonus = $coefficient[$level - 1][3];
      }else if($percent_like <= 85){
        $bonus = $coefficient[$level - 1][4];
      }else{
        $bonus = $coefficient[$level - 1][5];
      }
    }
    return $bonus;


  }

	public static function contestPointEarn($title, $vitri){
		$lv = self::titleToLv($title);
	    $score = [
	    	[20, 25, 30, 35, 40],
	    	[10, 15, 20, 25, 30],
	    	[05, 10, 15, 20, 25],
	    ];
	    return $score[$vitri - 1][$lv - 1];
	}
	public static function pointCalBasedOnPrevious($rate_star, $rating_value, $key)
  {
    $value = 0;
    switch ($key) {
      case "recommended":
        $value = $rating_value[0];
        break;
      case "work_quality":
        $value = $rating_value[1];
        break;
      case "management":
        $value = $rating_value[2];
        break;
      case "attitude":
        $value = $rating_value[3];
        break;
      case "item_delivery":
        $value = $rating_value[4];
        break;
    }
    if ($value > 2) {
      if ($rate_star >= $value) {
        if (($rate_star - $value) < 2) {
          return $rate_star;
        }
      }
    }else {
      if ($rate_star <= $value) {
        if (($rate_star - $value) < 2) {
          return $rate_star;
        }
      }
    }
    return 3;
  }

	public static function calculateRPBonus( $title, $vote_like, $total_vote, $num_months = 1){

		$level = self::titleToLv($title);
		$percent_like = 0;
		if($vote_like > 0 && $total_vote > 29){
			$percent_like = ($vote_like / $total_vote) * 100;
		}
		$coefficient = array(
			array(-1, -1, -1, 0, 1, 2),
      array(-1, -1, -1, 0, 1, 2),
      array(-1, -1, -1, 0, 1, 2),
      array(-1, -1, -1, 0, 1, 2),
      array(-1, -1, -1, 0, 1, 2),
		);
		$bonus = 0;
		if($level <= count($coefficient)){
			if($percent_like < 21){
				$bonus = $num_months * $coefficient[$level - 1][0];
			}else if($percent_like < 36){
				$bonus = $num_months * $coefficient[$level - 1][1];
			}else if($percent_like < 51){
				$bonus = $num_months * $coefficient[$level - 1][2];
			}else if($percent_like < 71){
				$bonus = $num_months * $coefficient[$level - 1][3];
			}else if($percent_like < 86){
				$bonus = $num_months * $coefficient[$level - 1][4];
			}else{
				$bonus = $num_months * $coefficient[$level - 1][5];
			}
		}
		return $bonus;
	}
  public static function calculateDayPost($dayPost){
    $datetime2 = strtotime(date("Y-m-d"));
    $datetime1 = strtotime($dayPost);
    $secs = (int)$datetime2 - $datetime1;
    $days =round($secs / 86400)+1 ;
    return Calculator::getMonth($days);
  }

  public static function calculateUserPlatform($countUse){
    if ($countUse <= 10){
      return 1;
    }
    if ($countUse <= 20){
      return 2;
    }
    if ($countUse <= 30){
      return 3;
    }
    return 5;
  }

  public static function getMonth($day){
    if($day < 90){
      return 1;
    }
    return 0;
  }
	public static function calculate_token($token_pot,$total_arbiter_win){
			// số % token bên dispute thắng nhận được
			$winning_party_percent_allotted = 0.05;
			// số % token trọng tài góp vào dispute
			$arbiter_percent_allotted = 0.04;
			//số % alchemist = seeker góp vào tranh chấp
			$party_percent_allotted = 0.4;
			//tkn_winning_party_won
    		$tkn_winning_party_won = $token_pot * 0.05;



    		//tổng số trọng tài thua
    		$total_arbiter_lost = 5 - $total_arbiter_win;
    		//tổng % bên thua được nhận
    		$total_percent_lost = $total_arbiter_lost * 0.1;
    		//tổng % bên thắng nhận được
    		$total_percent_win = 1 - $winning_party_percent_allotted - $total_percent_lost;
    		//số token alchemist góp vào dispute
    		$staked_tokens_alchemist = $token_pot * $party_percent_allotted;
    		//số token seeker góp vào dispute
    		$staked_tokens_seeker =  $token_pot * $party_percent_allotted;
    		//số token trọng tài phải góp vào dispute
    		$staked_tokens_arbiter = $token_pot * $arbiter_percent_allotted;

    		//token bên thắng phải trả (40%(ban đầu)-5%(thắng) = 35%)
    		$tkn_winning_party_lost = $token_pot * ($party_percent_allotted - $winning_party_percent_allotted);
    		//token bên thua phải trả ( 40%(ban đầu) + 0%(thua) = 40%)
    		$tkn_losing_party_lost = $token_pot * $party_percent_allotted;



    		//arbiter bên win nhận dc
    		$percent_arbiter_win = $total_percent_win/$total_arbiter_win;
    		$tkn_arbiter_win = $token_pot * $percent_arbiter_win;
    		//arbiter bên win nhận dc sau khi đã trừ khoản góp (4% góp dispute)
    		$tkn_arbiter_win_gained =  $token_pot *($total_percent_win/$total_arbiter_win - $arbiter_percent_allotted);
    		//arbiter lost dc 10%;
    		if($total_arbiter_lost != 0){
    			$percent_arbiter_lost = $total_percent_lost/$total_arbiter_lost;
    			$tkn_arbiter_lost = $token_pot * $percent_arbiter_lost;
	    		//arbiter bên lost nhận dc sau khi đã trừ khoản góp 4%
	    		$tkn_arbiter_lost_gained = $token_pot * ($total_percent_lost/$total_arbiter_lost - $arbiter_percent_allotted);
    		}else{
    			$percent_arbiter_lost = 0;
    			$tkn_arbiter_lost = 0;
    			$tkn_arbiter_lost_gained = 0;
    		}

    		$data =  array(
    			'tkn_pot' => $token_pot,
    			'staked_tokens_alchemist' =>  $staked_tokens_alchemist,
    			'staked_tokens_seeker' => $staked_tokens_seeker,
    			'staked_tokens_arbiter' => $staked_tokens_arbiter,

    			//số % token bên dispute thắng nhận được
    			'winning_party_percent_allotted' => $winning_party_percent_allotted*100,
    			// số token winning party won
    			'tkn_user_won' => $tkn_winning_party_won,

    			'tkn_user_win_lost' => $tkn_winning_party_lost,

    			'user_lose_allotted' => 0,
    			'tkn_user_lose_lost' => $tkn_losing_party_lost,

    			'percent_win'=> $percent_arbiter_win *100,
	    		'tkn_win' => $tkn_arbiter_win,
	    		'tkn_win_gained' => $tkn_arbiter_win_gained,
	    		'tkn_win_lost' => null,

	    		'percent_lose'=> $percent_arbiter_lost *100,
                'tkn_lose' => $tkn_arbiter_lost,
                'tkn_lose_gained' =>$tkn_arbiter_lost_gained,
                'tkn_lose_lost' => null,
	    	);
    		return (object)$data;
	}
	//results_credit
	public static function results_credit($data){
		switch ($data) {
			case 'sign_up':
				return 50;
				break;
			case 'sign_in':
				return 50;
				break;
			case 'add_skill':
				return 3;
				break;
			case 'add_education':
				return 3;
				break;
			case 'add_work_exp':
				return 3;
				break;
			case 'upload_profile_picture':
				return 3;
				break;
			case 'upload_past_work':
				return 3;
				break;
			case 'upload_articles':
				return 3;
				break;
			case 'upload_blogs':
				return 3;
				break;
			case 'upload_vlogs':
				return 3;
				break;
			case 'frequency_on_showcasing_5':
				return 5;
				break;
			case 'frequency_on_showcasing_10':
				return 10;
				break;
			case 'frequency_on_showcasing_15':
				return 15;
				break;
			default:
				# code...
				break;
		}
	}
	public static function fee_post_job($status,$value){
		switch ($status) {
			case 'normal':
				if($value == 1){
					return 3;
				}elseif($value == 2){
					return 5;
				}elseif($value == 4){
					return 7.5;
				}
				break;
			case 'featured_or_urgent':
				if($value == 1){
					return 5;
				}elseif($value == 2){
					return 7.5;
				}elseif($value == 4){
					return 10;
				}
				break;
			case 'featured_and_urgent':
				if($value == 1){
					return 10;
				}elseif($value == 2){
					return 15;
				}elseif($value == 4){
					return 20;
				}
				break;
			default:
				return false;
				break;
		}
	}

}
