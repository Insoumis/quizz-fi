@extends('layouts.quizz')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Quizz politique sur la France insoumise</div>
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
                                    <button class="btn btn-primary" type="submit" name="type" value="10">
                                        10 propositions<br />(environ 1 min)
                                    </button>
                                </div>
                                <div class="col-md-4 text-center">
                                    <button class="btn btn-primary" type="submit" name="type" value="20">
                                        20 propositions<br />(environ 2 min)
                                    </button>
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-primary" type="submit" name="type" value="40">
                                        40 propositions<br />(environ 5 min)
                                    </button>
                                </div>
                            </div>
                        </form>

                        <a class="btn btn-success" href="{{ route('top') }}">
                            <i class="glyphicon glyphicon-sort-by-attributes-alt"></i>
                            Top des propositions
                        </a>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
