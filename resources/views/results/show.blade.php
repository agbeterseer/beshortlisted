@extends('layouts.apps')

@section('content')
    <h3 class="page-title">@lang('cvmanagement.results.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('cvmanagement.view-result')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        @if(Auth::user()->is_admin())
                        <tr>
                            <th>@lang('cvmanagement.results.fields.user')</th>
                            <td>{{ $test->user->name or '' }} ({{ $test->user->email or '' }})</td>
                        </tr>
                        @endif
                        <tr>
                            <th>@lang('cvmanagement.results.fields.date')</th>
                            <td>{{ $test->created_at or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('cvmanagement.results.fields.result')</th>
                            <td>{{ $test->result }}/{{$questions}}</td>
                        </tr>
                    </table>
                <?php $i = 1 ?>

                @foreach($results as $result)

                    <table class="table table-bordered table-striped">
                        <tr class="test-option{{ $result->correct ? '-true' : '-false' }}">
                            <th style="width: 10%">Question #{{ $i }}</th>
                            <th>{{ $result->question->question_text or '' }}</th>
                        </tr>
                        @if ($result->question->code_snippet != '')
                            <tr>
                                <td>Code snippet</td>
                                <td><div class="code_snippet">{!! $result->question->code_snippet !!}</div></td>
                            </tr>
                        @endif
                        <tr>
                            <td>Options</td>
                            <td>
                                <ul>
                                @foreach($result->question->options as $option)
                                    <li style="@if ($option->correct == 1) font-weight: bold; @endif
                                        @if ($result->option_id == $option->id) text-decoration: underline @endif">{{ $option->option }}
                                        @if ($option->correct == 1) <em>(correct answer)</em> @endif
                                        @if ($result->option_id == $option->id) <em>(your answer)</em> @endif
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>Answer Explanation</td>
                            <td>
                            {!! $result->question->answer_explanation  !!}
                                @if ($result->question->more_info_link != '')
                                    <br>
                                    <br>
                                    Read more:
                                    <a href="{{ $result->question->more_info_link }}" target="_blank">{{ $result->question->more_info_link }}</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                <?php $i++ ?>
                @endforeach
                </div>
            </div>

        
        </div>
    </div>
@stop
