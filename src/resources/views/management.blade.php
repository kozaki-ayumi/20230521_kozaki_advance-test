<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Management System</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/management.css') }}" />
    
</head>
<body>
    <header class="header">
        <h2>管理システム</h2>
    </header>

<main>
  <div class="contact-form__content">
    <form class="search-form" action="/contacts/search" method="get">
      @csrf
     <div class="form__group-name--gender">

      <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input class="search-form-item" type="text" name="searchfullname" value="{{ old('searchfullname') }}"/>
            </div>
          </div>
      </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
        </div>
          <div class="form__group-content">
            <div class="form__input--text-gender">
              <div class="form__input--text-gender__content">
                <input  class="search-form-item" type="radio" name="searchgender" value="" 
                 style="transform:scale(2.0);" checked />
                <span class="gender__name">全て</span>
              </div>
              <div class="form__input--text-gender__content">
                <input  class="search-form-item" type="radio" name="searchgender" value="男性"  style="transform:scale(2.0);" />
                <span class="gender__name">男性</span>
              </div>
              <div class="form__input--text-gender__content">
                <input  class="search-form-item" type="radio" name="searchgender" value="女性" style="transform:scale(2.0);" />
                <span class="gender__name">女性</span>
              </div>  
            </div>
          </div>
        </div>

    </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">登録日</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="date" name="fromdate" value="{{ old('fromdate') }}"/> 〜
              <input type="date" name="untildate" value="{{ old('untildate') }}"/>
            </div>
          </div>
        </div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="searchemail" value="{{ old('searchemail') }}"/>
            </div>
          </div>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">検索</button>
        </div>
        <div class="reset__button">
              <input class="reset__button-submit "type="reset" name="reset" value="リセット"/>
            </div>
      </form>
    </div>
 
     {{ $contacts->links() }}
      <table class="table">
      <tr class="table__name">
         <th class="table__header-name">ID</th>
         <th class="table__header-name">お名前</th> 
         <th class="table__header-name">性別</th>
         <th class="table__header-name">メールアドレス</th> 
         <th class="table__header-name">
          ご意見</th>
      </tr>
      
     @foreach ($contacts as $contact)
      <tr class="table__row">
         <form class=data__item-input>
           <td class="data__item-input-content">{{$contact['id']}}</td>
           <td class="data__item-input-content">{{$contact['fullname']}}</td>
           <td class="data__item-input-content">{{$contact['gender']}}</td>
           <td class="data__item-input-content">{{$contact['email']}}</td>
           <td class="data__item-input-content" ><?=mb_strimwidth($contact['opinion'],0,50,'…','UTF-8')?></td>
         </form>

          <td class="table__item">
            <form class="delete-form" action="/contacts/delete" method="post">
              @method('DELETE')
              @csrf
                <div class="delete__button">
                  <input type="hidden" name="id" value="{{ $contact['id'] }}"> 
                  <button class="delete__button-submit" type="submit">削除</button>
                </div>
             </form> 
          </td>
       </tr>
       @endforeach
      </table>  

</main>
</body>
</html>