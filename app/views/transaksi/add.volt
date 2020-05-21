<div class="page-header">
    <h2>Input Bantuan</h2>
</div>

<form action="/transaksi/add" role="form" method="post">
    <fieldset>
        <div class="form-group">
            <label for="quantity">Jumlah Bantuan</label>
            <div class="controls">
                <input id="num" type="number" name="quantity" {%- if q is defined -%} value="{{q}}" {%- endif -%}>
            </div>
        </div>

        <div class="form-group">
            {{ submit_button('Submit', 'class': 'btn btn-secondary') }}
        </div>
    </fieldset>
</form>


{%- if q is defined and (q > 0) -%}
<form action="/transaksi/Submit" role="form" method="post">
    <fieldset>
        {% for i in 1..q %}
        <div class="mb-5">
            <label><b>Bantuan {{i}}</b></label>
            <div class="form-group">
                <label for="text">Bantuan berupa</label>
                <div class="controls">
                    {{ text_field('nama[]', 'class': "form-control") }}
                </div>
            </div>
            <div class="form-group">
                <label for="email">Kategori</label>
                <div class="controls">
                    <select name="categ[]">
                        {% for cat in cats %}
                        <option value="{{cat.id}}">{{cat.nama}}</option>
                        {%endfor%}
                    </select>
                </div>
            </div>
        </div>
        {% endfor %}
        <div class="form-group">
            {{ submit_button('Submit', 'class': 'btn btn-primary btn-large') }}
        </div>
    </fieldset>
</form>
{%- endif -%}