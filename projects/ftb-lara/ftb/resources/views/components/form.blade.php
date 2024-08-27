@props(["name"=>null
,"title"=>null,
"select"=>null,
"ms_team"=>null,
"ms_player"=>null,
"ms_team_player"=>null,
"select1"=>null,
"match_keys"=>null,
"select2"=>null,
"route"=>null,"keys"=>null,"files"=>null]),

 
 
        <div class="card card-height">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">{{ $title }}</h4>
                <form   id="{{ $name }}-form" method="post" action="{{ $route }}"  enctype="multipart/form-data">
                   @method('POST')
                    @csrf

                    @if($select1 && $select1 !== null)
                    <div class="mb-2">
                        <select class="my-select">
                            <option disabled selected value="Premier team">Première team</option>
                            @foreach($select1 as $sel)
                                <option value="{{ $sel['id'] }}">{{ $sel['nom'] }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                
                @if(isset($match_keys) && $match_keys !== null)
                    @foreach($match_keys as $field)
                        @if(isset($field['name']))
                            <div class="mb-2">
                                <input type="number" name="{{ $field['name'] }}" class="w-100 px-2 rounded input-team" placeholder="temps de jeu" min="0">
                            </div>
                        @endif
          
                        
                            <div class="mb-2">
                                <div class="form-group">
                                   
                                  
                                    <div class="time-input ">
                                        @if(isset($field['heure']))
                                            <input type="text" name="{{ $field['heure'] }}" id="hours" class="input-team" maxlength="2" placeholder="hh">
                                        @endif
                    
                                        @if(isset($field['minute']))
                                            <input type="text" name="{{ $field['minute'] }}" id="minutes" class="form-control" maxlength="2" placeholder="mm">
                                        @endif
                                    </div>
                                    
                                </div>
                            </div>
                        
                    @endforeach
                @endif
                           
                  
                  
                    @if(isset($select) && $select!==null)
                   
                    <div class="mb-2">
                            <select class="my-select" name="team">
                                <option disabled selected value="Selectionne la team ">Selectionne la team</option>
                               @if(isset($select))
                            
                               @foreach($select as $option)
                                <option value="{{$option['id']}}">{{$option['nom']}}</option>
                              @endforeach
                                @endif
                            </select>

                        
                    </div>
                   
                    @endif
                    @if(isset($ms_team) && $ms_team!==null)
                   
                    <div class="mb-2">
                        <select id="team-select" class="my-select" name="team">
                            <option disabled selected value="">Sélectionnez l'équipe</option>
                            @if(isset($ms_team))
                                @foreach($ms_team as $option)
                                    <option value="{{$option['id']}}" data-name="{{$option['nom']}}" data-pseudo="{{$option['pseudo']}}" data-representant="{{$option['representant']->nom}}">
                                        {{$option['nom']}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type="text" id="team-name" class="w-100 px-2 rounded input-team" name="team-name" value="" placeholder="Nom de l'équipe">
                    </div>
                    <div class="mb-2">
                        <input type="text" id="team-pseudo" class="w-100 px-2 rounded input-team" name="team-pseudo" value="" placeholder="Pseudo de l'équipe">
                    </div>
                    <div class="mb-2">
                        <input type="text" id="team-representant" class="w-100 px-2 rounded input-team" name="team-representant" value="" placeholder="Représentant de l'équipe">
                    </div>
                    
                   
                    @endif
                   
                
                    @if(isset($keys) && $keys!==null)
                    @foreach ($keys as $key)
                    
                    <div class="mb-2">
                        <label for="{{ ucfirst($key['name']) }}" class="form-label">{{ $key['label'] }}</label>
                        <input type="text" name="{{ $key['name'] }}" id="{{ ucfirst($key['name']) }}" class="form-control" required>
                    </div>
                @endforeach
                @endif
                   @if(isset($files) && $files!==null)
                    @foreach ($files as $file)
                        <div class="uploader">
                            <img id="{{ ucfirst($file['label']) }}Image" src="https://via.placeholder.com/100" alt="Logo for {{ $file['label'] }}">
                            <input type="file" id="{{ ucfirst($file['label']) }}-image" name="{{ $file['name'] }}" class="d-none" accept="image/*" onchange="displayImage(this, '{{ ucfirst($file['label']) }}Image')">
                            <label for="{{ ucfirst($file['label']) }}-image" class="btn-upload">Charger le logo pour {{ $file['label'] }}</label>
                       
                        </div>
                    @endforeach
                    @endif
                  
              
            
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn but-primary " id="{{ $name }}-submit">
                            <span id="{{ $name }}-loader" class="spinner-border spin-l text-success spinner-border-sm d-none"></span>
                            {{ $name }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
      
  
