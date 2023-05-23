
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/footer.css') }}">
</head>
<body>
    <div class="div3">
    <div class="div2" id="contact">
            <div class="cntcontact">
            <h3>{{__('CONTACT US')}}</h3>
                    <p> {{__('Let\'s get in touch.')}}</p>
                    <br>
                    <p>
                        <i class="fa fa-map"></i>
                        5 Ahmed Zewail, Ad Doqi, {{__('Giza Governorate')}}
                    </p>
                    <br>
                    <p>
                        <i class="fa fa-mobile"></i>
                        (617) 557-0089
                    </p>
                    <br>
                    <p>
                        <i class="fa fa-paper-plane"></i>
                        contact@example.com
                    </p>
            </div>
    </div>
            <div class="lnkcnt">
                <a class="contribute" href="https://www.facebook.com/"><i class="	fa fa-facebook"></i></a>
                <a class="contribute" href="https://twitter.com/explore?lang=en"><i class="	fa fa-twitter"></i></a>
                <a class="contribute" href="https://www.google.com/"><i class="	fa fa-google"></i></a>
                <a class="contribute" href="https://github.com/"><i class="	fa fa-github"></i></a>
            </div>
            <p> {{__('Copy Right 2018 © By')}}</p>
            <a href="#home"> {{__('Theme-fair')}}</a>
            <p> {{__('All Rights Reserved')}}</p>
    </div>
</body>
</html>
