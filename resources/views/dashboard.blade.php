<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Door 4S, voor de gokkers!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="match_today container" id="match_today">
                        @if (count($games) == 0)
                            <p>Er zijn momenteel geen wedstrijden.</p>
                        @else
                        <h2>Algemene League</h2>

                        <div class="widget-content">

                            <!--match mdw-->
                            @foreach ($games as $game)
                                <div class="mnajiri">
                                    <a class="fullink" href="#"></a>
                                    <div class="mnajiriin">
                                        <div class="mpart1">
                                            <div class="right_match">
                                              <span class="right_tech">
                                                 <img src="img/jersey_icon_2.png">
                                                  <div class="fname">{{ $game->team1->name }}</div>
                                               </span>
                                            </div>
                                            <strong class="najiri1">{{ $game->datetime == null ? "n.v.t." : date("H:i", strtotime($game->datetime)) }}</strong>
                                            <div class="left_match">
                                               <span class="left_tech">
                                                 <img src="img/jersey_icon_1.png">
                                                   <div class="fname">{{ $game->team2->name }}</div>
                                               </span>
                                            </div>
                                        </div>
                                        <div class="details_match">
                                          <span class="first_match">
                                             <i aria-hidden="true" class="fa fa-clock-o"></i><b>ZiggoSports 1</b>
                                           </span>
                                            <span class="thany"><i aria-hidden="true" class="fa fa-futbol-o"></i><b>{{$game->field->name}}</b></span>
                                            <span class="liga_mdw"><i aria-hidden="true" class="fa fa-desktop"></i><b>Bein Sport HD1</b></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

{{--                            <!--match mdw-->--}}
{{--                            <div class="mnajiri">--}}
{{--                                <a class="fullink" href="#"></a>--}}
{{--                                <div class="mnajiriin">--}}
{{--                                    <div class="mpart1">--}}
{{--                                        <div class="right_match">--}}
{{--                                            <span class="right_tech">--}}
{{--                                               <img src="https://1.bp.blogspot.com/-Sy8KMWfGjgM/XO94YxfPRZI/AAAAAAAAF2k/o7ry2Vm2GJEBjQcnOwMLDJZ8I423WTcGgCEwYBhgL/s1600/u.png">--}}
{{--                                                <div class="fname">ليفربول</div>--}}
{{--                                             </span>--}}
{{--                                        </div>--}}
{{--                                        <strong class="najiri2">شوط 1</strong>--}}
{{--                                        <div class="left_match">--}}
{{--                                             <span class="left_tech">--}}
{{--                                               <img src="https://1.bp.blogspot.com/-tPibRsTPCD8/XO93jyQudZI/AAAAAAAAF2Q/DIGITySC8jksEBnRuz5nFtREIl-09Y3aQCEwYBhgL/s1600/c.png">--}}
{{--                                                 <div class="fname">برايتون</div>--}}
{{--                                             </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="details_match">--}}
{{--                                        <span class="first_match">--}}
{{--                                           <i aria-hidden="true" class="fa fa-clock-o"></i><b>جارية الأن</b>--}}
{{--                                         </span>--}}
{{--                                        <span class="thany"><i aria-hidden="true" class="fa fa-futbol-o"></i><b>الدوري الانجليزي</b></span>--}}
{{--                                        <span class="liga_mdw"><i aria-hidden="true" class="fa fa-desktop"></i><b>Bein Sport HD1</b></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{--                    <div class="teams">--}}
{{--                        @if (count($teams) == 0)--}}
{{--                            <p>Er zijn geen teams</p>--}}
{{--                        @else--}}
{{--                            @foreach ($teams as $team)--}}
{{--                                    <p>{{ $team->name }}</p>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
