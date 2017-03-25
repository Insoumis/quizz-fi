@extends('layouts.quizz')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 fi-accueil-bloc">

              <div class="fi-top-menu">
                  @include('components.social_links_top')
                  <a class="btn btn-info btn-sm fi-top-propositions" href="{{ route('index') }}">
                      <i class="fa fa-home"></i> Retour à l'accueil
                  </a>
              </div>


                <div class="panel panel-default fi-boite-accueil">
                    <div class="panel-body">
                        <h1 style="margin-top: 0; margin-bottom:30px;">Top des propositions</h1>
                        @foreach($resultByQuestion as $questionId => $result)
                            @php
                                $question = $questions->find($questionId);
                                $urlToQuestion = URL::full() . '#q' . $question->id;
                            @endphp
                            <a id="q{{ $question->id }}" name="q{{ $question->id }}"></a>
                            <div class="row" style="padding-bottom: 15px;">
                                <div class="col-md-3">
                                  <img class="img-responsive" title="{{ $question->category->name }}" alt="{{ $question->category->name }}" src="/images/themes/{{ $question->category->slug }}.png" />
                                </div>
                                <div class="col-md-5" style="text-align: left;">
                                    {{ $question->proposition }}
                                </div>
                                <div class="col-md-3">
                                    {{ round($result->pct, 2) }}% <i class="fa fa-info-circle" data-toggle="tooltip" title="Score moyen sur une total de {{ $result->total }} affichages"></i>
                                </div>
                                <div class="col-md-1">
                                  <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ urlencode($urlToQuestion) }}"><i
                                              class="fa fa-facebook" aria-hidden="true"></i></a>
                                  <a target="_blank" href="http://twitter.com/intent/tweet?status={{ urlencode($question->proposition . ' : ' . $urlToQuestion) }}"><i
                                              class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('index') }}" class="btn btn-info"><i class="fa fa-home"></i> Retour à
                    l'accueil</a>

            </div>
        </div>
    </div>
@endsection


@push('js')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush