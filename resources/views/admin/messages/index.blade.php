@extends('layouts.admin')
@section('styles')
    <style>
      .message {
        list-style: none;
        margin: 0;
        padding: 0;
      }

      .message li {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dotted #B3A9A9;
      }

      .message li .message-body p {
        margin: 0;
        color: #777777;
      }

      .card-body {
        overflow-y: scroll;
        height: 350px;
      }

      ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
      }

      ::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
      }

      ::-webkit-scrollbar-thumb {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
      }
    </style>
@endsection
@section('content')
<!--     <div class="container">
        <div class="row">
            <div class="col-md-8 md-offset-2">
                <div class="card card-default">
                    <div class="card-header">Messages</div>

                    <example-component></example-component>
                </div>
            </div>
        </div>
    </div> -->
    
    <Chat :user="{{auth()->user()}}"></Chat>
@endsection
@section('scripts')
    {{-- <script type="text/javascript" src="https://unpkg.com/@cometchat-pro/chat@1.8.3/CometChat.js"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script> 

    {{-- <script type="text/javascript">
      var appID = "516732fb15f230";

      CometChat.init(appID).then(
        () => {
          console.log("Initialization completed successfully");
          // You can now call login function.
        },
        error => {
          console.log("Initialization failed with error:", error);
          // Check the reason for error and take appropriate action.
        }
      );
    </script> --}}
@endsection()