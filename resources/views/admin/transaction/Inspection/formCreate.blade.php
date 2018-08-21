<div class="col-md-12">
        <div class="panel-body">
            <div id="form-box" class="panel-group" role="tab-list" aria-multiselectable="true">
            </div>
        </div>
            <div class="form-group">
                {!! Form::label('remarks', 'Remarks') !!}
                {!! Form::textarea('remarks',null,[
                    'class' => 'form-control',
                    'placeholder'=>'Remarks',
                    'maxlength'=>'140',
                    'rows' => '1']) 
                !!}
            </div>
        </div>
    </div>
</div>

