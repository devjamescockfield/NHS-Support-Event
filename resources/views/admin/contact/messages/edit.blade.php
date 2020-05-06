{{-- \resources\views\admin\support\messages\edit.blade.php --}}
@extends('layouts.admin-app')

@section('title', 'Edit Feedback Message')

@section('content')
    <div class="container col-md-10 mt-md-2 offset-md-2">
        <div class="row justify-content-center mt-md-5">
            <div class="col-md-12">
                <div class="text-white">
                    <div>
                        <h1 style="color: black" class="mx-auto text-center"><i class="fa fa-ticket-alt"></i> Edit Preset Feedback Message</h1>
                    </div>

                    <div>
                        <div class="col-md-12 mt-md-4">
                            <form method="post" action="{{ route('admin.contact-messages.update', $message->id) }}">
                                @csrf
                                @method('PATCH')

                                <div class="row col-md-12">
                                    <div class="col-md-4 mx-auto">
                                        <label style="color: black" for="description">Preset Message Description</label>
                                        <input class="form-control" type="text" id="description" name="description" value="{{ $message->description }}">
                                    </div>
                                    <div class="col-md-2 mx-auto">
                                        <label style="color: black" for="language">Language</label>
                                        <select style="color: black !important;" class="select-css form-control" id="language" name="language">
                                            <option selected="selected" value="{{ $message->language }}">{{ $message->language }}</option>
                                            <option value="AF">Afrikanns</option>
                                            <option value="SQ">Albanian</option>
                                            <option value="AR">Arabic</option>
                                            <option value="HY">Armenian</option>
                                            <option value="EU">Basque</option>
                                            <option value="BN">Bengali</option>
                                            <option value="BG">Bulgarian</option>
                                            <option value="CA">Catalan</option>
                                            <option value="KM">Cambodian</option>
                                            <option value="ZH">Chinese (Mandarin)</option>
                                            <option value="HR">Croation</option>
                                            <option value="CS">Czech</option>
                                            <option value="DA">Danish</option>
                                            <option value="NL">Dutch</option>
                                            <option value="EN">English</option>
                                            <option value="ET">Estonian</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finnish</option>
                                            <option value="FR">French</option>
                                            <option value="KA">Georgian</option>
                                            <option value="DE">German</option>
                                            <option value="EL">Greek</option>
                                            <option value="GU">Gujarati</option>
                                            <option value="HE">Hebrew</option>
                                            <option value="HI">Hindi</option>
                                            <option value="HU">Hungarian</option>
                                            <option value="IS">Icelandic</option>
                                            <option value="ID">Indonesian</option>
                                            <option value="GA">Irish</option>
                                            <option value="IT">Italian</option>
                                            <option value="JA">Japanese</option>
                                            <option value="JW">Javanese</option>
                                            <option value="KO">Korean</option>
                                            <option value="LA">Latin</option>
                                            <option value="LV">Latvian</option>
                                            <option value="LT">Lithuanian</option>
                                            <option value="MK">Macedonian</option>
                                            <option value="MS">Malay</option>
                                            <option value="ML">Malayalam</option>
                                            <option value="MT">Maltese</option>
                                            <option value="MI">Maori</option>
                                            <option value="MR">Marathi</option>
                                            <option value="MN">Mongolian</option>
                                            <option value="NE">Nepali</option>
                                            <option value="NO">Norwegian</option>
                                            <option value="FA">Persian</option>
                                            <option value="PL">Polish</option>
                                            <option value="PT">Portuguese</option>
                                            <option value="PA">Punjabi</option>
                                            <option value="QU">Quechua</option>
                                            <option value="RO">Romanian</option>
                                            <option value="RU">Russian</option>
                                            <option value="SM">Samoan</option>
                                            <option value="SR">Serbian</option>
                                            <option value="SK">Slovak</option>
                                            <option value="SL">Slovenian</option>
                                            <option value="ES">Spanish</option>
                                            <option value="SW">Swahili</option>
                                            <option value="SV">Swedish </option>
                                            <option value="TA">Tamil</option>
                                            <option value="TT">Tatar</option>
                                            <option value="TE">Telugu</option>
                                            <option value="TH">Thai</option>
                                            <option value="BO">Tibetan</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TR">Turkish</option>
                                            <option value="UK">Ukranian</option>
                                            <option value="UR">Urdu</option>
                                            <option value="UZ">Uzbek</option>
                                            <option value="VI">Vietnamese</option>
                                            <option value="CY">Welsh</option>
                                            <option value="XH">Xhosa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-10 mt-md-4 mx-auto">
                                    <label style="color: black" for="message">Preset Message</label>
                                    <textarea class="form-control" type="text" id="message" name="message">{{ $message->message }}</textarea>
                                    <button class="btn btn-success mt-md-3" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('textarea').autoResize();
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $("#message").height($("#message")[0].scrollHeight);
        });
    </script>
@endsection

