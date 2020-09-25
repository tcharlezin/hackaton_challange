@if(env("ADMIN_LAYOUT_DISPLAY_ASIDE_BAR"))
<!--ASIDE-->
<!--===================================================-->
<aside id="aside-container">
    <div id="aside">
        <div class="nano">
            <div class="nano-content">

                <!--Nav tabs-->
                <!--================================-->
                <ul class="nav nav-tabs nav-justified">
                    <li class="active">
                        <a href="#tab-mensagens" data-toggle="tab">
                            <i class="demo-pli-speech-bubble-7"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#tab-avisos" data-toggle="tab">
                            <i class="demo-pli-information icon-fw"></i> Avisos
                        </a>
                    </li>
                </ul>
                <!--================================-->
                <!--End nav tabs-->



                <!-- Tabs Content -->
                <!--================================-->
                <div class="tab-content">

                    @php
                        $messages = \App\Facade\Admin::getMessages();
                        $hasMessages = $messages->count() > 0;
                    @endphp

                    <!--First tab (Contact list)-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="tab-pane fade in active" id="tab-mensagens">
                        <p class="pad-hor mar-top text-semibold text-main">
                            @if($hasMessages)
                                <span class="pull-right badge badge-warning">{{$messages->count()}}</span> Mensagens
                            @else
                                Mensagens
                            @endif
                        </p>

                        <!--Family-->
                        <div class="list-group bg-trans">

                            @if($hasMessages)
                                @foreach($messages as $message)

                                    <a href="#" class="list-group-item">
                                        <div class="media-left pos-rel">
                                            <img class="img-circle img-xs" src="{{ asset("admin/img/profile-photos/2.png") }}" alt="Profile Picture">
                                            <i class="badge badge-success badge-stat badge-icon pull-left"></i>
                                        </div>
                                        <div class="media-body">
                                            <p class="mar-no">Stephen Tran</p>
                                            <small class="text-muted">Availabe</small>
                                        </div>
                                    </a>

                                @endforeach
                            @else
                                <a href="#" class="list-group-item">
                                    <p class="text-center">Não há mensagens criadas!</p>
                                </a>
                            @endif

                        </div>

                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End first tab (Contact list)-->


                    <!--Second tab (Custom layout)-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="tab-pane fade" id="tab-avisos">

                        <p class="pad-hor mar-top text-semibold text-main">
                            Avisos
                        </p>

                        <!--Family-->
                        <div class="list-group bg-trans">
                            <a href="#" class="list-group-item">
                                <p class="text-center">Não há avisos!</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</aside>
<!--===================================================-->
<!--END ASIDE-->

@endif
