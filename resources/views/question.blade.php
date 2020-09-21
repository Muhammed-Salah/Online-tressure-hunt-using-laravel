<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Quiz</title>
</head>
<body>


<div class="banner_image">
    <form class="container" style="max-width: 97% " action="{{ route('AnswerSave') }}" method="post" name="questionform">
        @csrf
            <div class="banner_content">
                <center>
                    <?php $j = Session::get('start'); ?>
                <div class="btn btn-primary btn-lg disabled" style="background-color: darkblue">Question {{$j}}</div>
                    <p><h4>Those who completely answered all the questions with minimum time will be announced as the winner.<br><br></h4>
                </center>
                <form action="{{ route('AnswerSave') }}" method="post" name="questionform">
                    @csrf
                    <div style="margin-left: 15%">
                        <div class="form-group">
                            <div class="radio radio-inline">
                                <label class="text-primary">
                                    <input type="radio" value="A" id="submit" name="submit"><b> &nbsp;A</b>
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label class="text-primary">
                                    <input type="radio" value="B" id="submit" name="submit"><b> &nbsp;B</b>
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label class="text-primary">
                                    <input type="radio" value="C" id="submit" name="submit"><b> &nbsp;C</b>
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label class="text-primary">
                                    <input type="radio" value="D" id="submit" name="submit" ><b> &nbsp;D</b>
                                </label>
                            </div>
                            <div class="text-danger">
                                {{Session::get('message')}}
                                <?php Session::forget('message'); ?>
                            </div>

                        </div>
                    </div>

{{--                    <script>--}}
{{--                        setInterval(function(){ <?php session('timeout'=> 1) return route('AnswerSave'); ?> }, 180000);--}}
{{--                    </script>--}}

                    <center>
                        <input type='submit' value="Submit & Next" class='btn  btn-fill btn-primary btn-wd' name='next' >
                    </center>
                </form>
            </div>

        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning" style="border-radius: 10px;margin-left: 150px;margin-right: 150px"><span><b>Important Note</b></span><br> In case you encounter any technical difficulty which disrupts , don’t worry. You can resolve the issue and resume the competition by using your Phone Number & Password. If you are unable to resume the competition, the competition will auto submit and all responses to questions you had already attempted will be considered for evaluation. </div>
            </div>
        </div>
    </form>
    </div>
</body>
</html>
