<!----Audio Player Section---->
<div class="ms_player_wrapper">
    <div class="ms_player_close">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </div>
    <div class="player_mid">
        <div class="audio-player">
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                <div class="player_left">
                </div>
                <!----Right Queue---->
                <div class="jp_queue_wrapper">
                    <div id="playlist-wrap" class="jp-playlist">
                        <div class="jp_queue_cls">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                        <h2>queue</h2>
                        <div class="jp_queue_list_inner">
                            <ul>
                                <li>&nbsp;</li>
                            </ul>
                        </div>
                        <div class="jp_queue_btn">
                            <a href="javascript:;" class="ms_clear" data-toggle="modal"
                                data-target="#clear_modal">clear</a>
                            <a href="clear_modal" class="ms_save" data-toggle="modal" data-target="#save_modal">save</a>
                        </div>
                    </div>
                </div>
                <div class="jp-type-playlist">
                    <div class="jp-gui jp-interface flex-wrap">
                        <div class="jp-controls flex-item">
                            <button class="jp-play" tabindex="0">
                                <i class="ms_play_control"></i>
                            </button>
                        </div>
                        <div class="jp-progress-container flex-item">
                            <div class="jp-time-holder">
                                <span class="jp-current-time" role="timer" aria-label="time">&nbsp;</span>
                                <span class="jp-duration" role="timer" aria-label="duration">&nbsp;</span>
                            </div>
                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar">
                                        <div class="bullet"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jp-volume-controls flex-item">
                            <div class="widget knob-container">
                                <div class="knob-wrapper-outer">
                                    <div class="knob-wrapper">
                                        <div class="knob-mask">
                                            <div class="knob d3"><span></span></div>
                                            <div class="handle"></div>
                                            <div class="round">
                                                <img src="{{ asset('admin/images/svg/volume.svg') }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <input></input> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--main div-->
</div>
