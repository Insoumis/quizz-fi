@extends('layouts.quizz')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('top') }}">
                                <i class="fa fa-trophy"></i>
                                Top des propositions
                            </a>
                        </div>

                        <strong>Quizz politique sur la France insoumise</strong>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid atque cum cumque
                            dignissimos dolorum esse est, ipsam maiores, maxime minima molestias nemo perferendis, quasi
                            ratione sed similique tempora unde vitae.</p>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus harum pariatur tempore
                            ullam. Aspernatur cupiditate nobis odit quaerat qui quia soluta tenetur. Blanditiis,
                            expedita illo magnam odio quasi totam voluptatem!</p>

                        <form action="{{ route('generate_quizz') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4 text-left">
                                    <button class="btn btn-block btn-primary" type="submit" name="type" value="10">
                                        10 propositions<br/>(environ 1 min)
                                    </button>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button class="btn btn-block btn-primary" type="submit" name="type" value="20">
                                        20 propositions<br/>(environ 2 min)
                                    </button>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-block btn-primary" type="submit" name="type" value="40">
                                        40 propositions<br/>(environ 5 min)
                                    </button>
                                </div>
                            </div>
                        </form>

                        <p>
                            <h3>Faites tourner !</h3>
                            <a href="http://www.facebook.com/sharer/sharer.php?u={{ URL::full() }}"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="http://twitter.com/intent/tweet?status={{ urlencode('Venez participer au quizz sur la France insoumise et son programme l\'Avenir en commun : ' . URL::full()) }}"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://plus.google.com/share?url={{ URL::full() }}"><i class="fa fa-google-plus"
                                                                                             aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
