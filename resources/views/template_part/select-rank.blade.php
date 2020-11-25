<div class="w-select35" style="margin-bottom: -5px; margin-left: 0px;">

  <fieldset class="form-group" style="margin-left: 0px;">
    <div class="btn-group bootstrap-select form-control">

      <select class="selectpicker form-control loca" tabindex="-98">

        <option value="" >Podium Selection</option>
        @for($i=1; $i<=4; $i++)
          <?php $vitri = $contest->vitri($i);?>
          <option value="{{$i}}"
            {{($vitri) ? 'disabled' : ''}}
            {{($entry->rank == $i) ? 'selected' : ''}}>{{addOrdinalNumberSuffix($i)}}
            {{($vitri) ? '(Locked)' : 'Place'}}
          </option>
        @endfor
      </select>
    </div>
    <span class="material-input"></span>
  </fieldset>
</div>
