@extends('layouts.app')
@section('styles')
<style>
    .other-users-message {
        height: auto;
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .user-message {
        height: auto;
        border: 2px solid #dedede;
        background-color: #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .time-left {
        float: left;
        padding: 2%;
    }

    .time-right {
        float: right;
        padding: 2%;
    }
</style>
@endsection
@section('content')
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Topic - {{$discussion->name}}</h4>
                <input type="hidden" id="discussion_id" value="{{ $discussion->id }}">
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <discussion-comments v-bind:comments="comments" userid="{{ Auth::user()->id }}">
                                </discussion-comments>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-md-5 offset-md-3">
                                        <textarea id="comment_text" name="comment_text" class="form-control" cols="30"
                                            rows="1"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-primary" type="button"
                                            id="btn_send_comment">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        autosize($('textarea'));

        $('#btn_send_comment').click(function(e){
            $.ajax({                    
                url: '/send/comment',
                type: 'POST',                  
                data: {
                    comment: $('#comment_text').val(),
                    discussion_id: $('#discussion_id').val(),
                },
                dataType: 'json',     
                success: function (data) {

                    if (data.result == 0) {
                        swal({
                            title: data.status,
                            text:  data.message,   
                            icon:   "error",
                        });
                    }

                    if (data.result == 1) {
                        $('#comment_text').val('');
                    }
                }
            }); 
        });

    });
</script>
@endsection