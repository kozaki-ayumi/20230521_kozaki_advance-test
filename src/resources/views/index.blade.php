<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <h2>お問い合せ</h2>
    </header>

<main>
  <div class="contact-form__content">
    <form class="form" action="/contacts/confirm" method="post">
      @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>  
          <div class="form__group-content">
            <div class="form__input--text-name">
              <div class="form__input--text-first--name">
                 <input type="text" name="first-name" value="{{ old('first-name') }}"/>
              </div>
              <div class="form__input--text-last--name">
                 <input type="text" name="last-name" value="{{ old('last-name') }}"/>
              </div>   
            </div>
            <div class="form__example">
              <div class="form__example-name">例) 山田</div>
              <div class="form__example-name">例) 太郎</div>
            </div>
            <div class="form__error">
              @error('first-name')
              {{ $message }}
              @enderror
              @error('last-name')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-gender">
              <div class="form__input--text-gender__content">
                <input type="radio" name="gender" value="男性"  style="transform:scale(2.0);" checked />
                <span class="gender__name">男性</span>
              </div>
              <div class="form__input--text-gender__content">
                <input type="radio" name="gender" value="女性" style="transform:scale(2.0);" />
                <span class="gender__name">女性</span>
              </div>  
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" value="{{ old('email') }}"/>
            </div>
            <div class="form__example">
              <div class="form__example-email">例）test@example.com</div>
            </div>
            <div class="form__error">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>  

       <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">郵便番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="postcode__content">
              <div class>〒</div>
              <div class="form__input--text--postcode">
              <input type="postcode" name="postcode" value="{{ old('postcode') }}"/>
              </div>
            </div>  
            <div class="form__example">
              <div class="form__example-postcode">例）〒123-4567</div>
            </div>
            <div class="form__error">
              @error('postcode')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>  

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" value="{{old('address')}}"/>
            </div>
            <div class="form__example">
              <div class="form__example-address"> 例）東京都渋谷区千駄ヶ谷１−２−３
              </div>
            </div>
            <div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building_name" value="{{ old('building_name') }}"/>
            </div>
            <div class="form__error">
              @error('building_name')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">ご意見</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
              <textarea class="form__input--text__opinion" name="opinion" maxlength="120">{{old('opinion')}}</textarea> 
              <div class="form__error">
               @error('opinion')
              {{ $message }}
              @enderror
              </div>
          </div>
        </div>


        <div class="form__button">
          <button class="form__button-submit" type="submit">確認</button>
        </div>

      </form>
    </div>
</main>
</body>
</html>