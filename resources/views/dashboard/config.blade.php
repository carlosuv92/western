<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">New message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="POST" action={{route('precio.actualiza')}}>
                    @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Precio de Poket Jr:</label>
                        <input type="text" value="{{$precio_pre}}" class="form-control" id="jr" name="jr" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Precio de Poket Pro:</label>
                        <input type="text" value="{{$precio_pro}}" class="form-control" id="pro" name="pro" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="control-label">Precio de Poket Full:</label>
                        <input type="text" value="{{$precio_full}}" class="form-control" id="full" name="full" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <label for="message-text" class="control-label">Fecha de Inicio:</label>
                                <input type="date" class="form-control" id="ini" name="ini" required>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="message-text" class="control-label">Fecha de Fin:</label>
                                <input type="date" class="form-control" id="fin" name="fin" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
        </div>
        </form>
    </div>
</div>
