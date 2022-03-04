@extends('dasborduser.layouts.app')
@section('content')
    <style>
        /* (A) SEARCH BOX */
        #the-filter {
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
        }

        /* (B) LIST */
        #the-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        #the-list li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        #the-list li:hover {
            background: #fffed6;
        }

        #the-list li.hide {
            display: none;
        }


        /* (X) DOES NOT MATTER */
        /* PAGE & BODY */
        * {
            font-family: arial, sans-serif;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            min-height: 100vh;
            background-image: url(https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fgray-and-white-background&psig=AOvVaw2sgSL6MQn6biTTKe0m45-q&ust=1645916664768000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMDm8sP7m_YCFQAAAAAdAAAAABAO);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        /* WIDGET */
        .widget-wrap {
            min-width: 500px;
            padding: 30px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.4);
        }

        /* FOOTER */
        #code-boxx {
            font-weight: 600;
            margin-top: 50px;
        }

        #code-boxx a {
            display: inline-block;
            padding: 5px;
            text-decoration: none;
            background: #b90a0a;
            color: #fff;
        }

    </style>

    <body>
        <div class="widget-wrap">
            <button class="btn btn-danger waves-effect waves-light button-print-or-save-document">Save as PDF</button>
            <img src="{{ asset('/assets/images/monolist_red_full_02.png') }}" alt="" height="18" class="auth-logo-light">
            <br>
            <br>
            <h1>{{ $userList->name }}</h1>
            <!-- (B) LIST OF ITEMS -->
            <ul id="the-list">
                @if($userList !== null)
                @foreach ( $userItem as $data )
                <li>{{ $data->name }}</li>
                @endforeach
                @endif
            </ul>
            <!-- (X) VISIT CODE-BOXX -->
            <div id="code-boxx">
                Visit
                <a href="https://monolist.io" target="_blank">
                    Monolist
                </a>
            </div>
        </div>
        

    </body>
    <script>
        const buttonPrintOrSaveDocument = document.querySelector(".button-print-or-save-document");

function printOrSave() {
	window.print();
}

buttonPrintOrSaveDocument.addEventListener("click", printOrSave);


</script>
@endsection
