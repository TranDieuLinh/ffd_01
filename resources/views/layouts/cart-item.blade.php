<div class="row-cart">
    <div class="row-fluid">
        <div class="span2">
            <img class="mar-left max-hi" src="{{ $row->options->image }}">
        </div>
        <div class="span6">
            <h4 class="mar-left" style="color: #2a88bd">{{ $row->name }} </h4>
            <h5 class="mar-left qua-before">Quantity: {{ $row->qty }}</h5>
            <div class="comment-content edit-review-content qua-after" style="display: none">
                <div class="controls">
                    <input type="number" min="1" max="{{ \App\Models\Food::find($row->id)->quantity }}"
                           value = "{{ $row->qty }}" name="quantity" class="span3">
                </div>
                <button style="height: 30px;" type="submit" class="btn btn-success btn-edit green"
                        data-rowid="{{ $row->rowId }}">Edit</button>
            </div>
        </div>
        <div class="span4 alignR">
            <form class="form-horizontal qtyFrm">
                <h4 class="mar-right">{{ $row->price }} VNĐ</h4>
                <span class="pull-right">
                                            <a data-original-title="Edit this user" data-toggle="tooltip" type="button"
                                               class="btn btn-sm btn-warning" ><i class="glyphicon glyphicon-edit"></i>
                                            </a>
                                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button"
                                               class="btn btn-sm btn-danger" data-rowid="{{ $row->rowId }}">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </a>
                                        </span>
            </form>
        </div>
    </div>
    <hr class="soft">
</div>