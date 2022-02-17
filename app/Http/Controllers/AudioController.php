<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudioController extends Controller
{
    function showAudio($id){
        $data=array(
            'status' => 1,
            'data' => array(
                'id'=>$id,
                'video_title'=>'I\'m in love with you',
                'video_pic'=>'https://english-new-test-1252522393.cos.ap-beijing.myqcloud.com/images/xrifjcW6ykROhoVB6fIgYqCKj7Sqc70JSDsHUOUL.png',
                'video_mp3'=>'https://english-new-test-1252522393.cos.ap-beijing.myqcloud.com/images/Fk5VvKfPPzw3BRYFZqI4fKERbelZ2ILYpI1pwHqW.mp3',
                'video_zimu'=>array(
                    0=>array(
                        'time'=>"00:00",
                        'words'=>"I don't want to fight, Sersi. | 我不想吵架 瑟希"
                    ),
                    1=>array(
                        'time'=>"00:02",
                        'words'=>"It'll all end soon. | 这一切很快就会结束"
                    ),
                    2=>array(
                        'time'=>"00:04",
                        'words'=>"Except there is no end, is there? | 只是没有尽头 是吗 "
                    ),
                    3=>array(
                        'time'=>"00:07",
                        'words'=>"We'd carry on without our memories | 我们会继续前进 没有记忆 "
                    ),
                    4=>array(
                        'time'=>"00:09",
                        'words'=>"or free will? | 没有自由意志 "
                    ),
                    5=>array(
                        'time'=>"00:11",
                        'words'=>"for eternity | 永远这样下去 "
                    ),
                    6=>array(
                        'time'=>"00:18",
                        'words'=>"You're afraid.| 你怕了 "
                    ),
                    7=>array(
                        'time'=>"00:20",
                        'words'=>"I wouldn't mind leaving this world.| 我不介意离开这个世界 "
                    ),
                    8=>array(
                        'time'=>"00:23",
                        'words'=>"I only wish that when we do,| 我只愿当我们离开时 "
                    ),
                    9=>array(
                        'time'=>"00:27",
                        'words'=>"I would be able to remember you.| 我能记得你 "
                    ),
                    10=>array(
                        'time'=>"00:31",
                        'words'=>"I'm in love with you, Sersi.| 我爱上你了 瑟希 "
                    ),
                    11=>array(
                        'time'=>"00:34",
                        'words'=>"I'm grateful for the life I've lived with you.| 我很感激与你共度的岁月 "
                    ),
                ),
                'created_at'=>'2021-12-05T22:17:12.000000Z',
                'updated_at'=>'2021-12-05T22:18:11.000000Z',
                'dialogue_base_id'=>'3'
            )
        );
        return response()->json($data);
    }
}
