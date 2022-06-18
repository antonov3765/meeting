
<div class="justify-content-around row" style="margin-top: 12rem;">
    <div id="map"></div>
    <form action="/info/<?=$meetings->id?>" method="post" class="col-sm-12 col-md-8 col-lg-4";>
        <h1 class="display-6">Info</h1>
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="date">Date</label><span style="color: red !important; display: inline; float: none;">*</span>
                <p name="date" type="date" class="form-control" id="date"><?=$meetings->date?></p>
            </div>
            <div class="form-group col-md-6">
                <label for="time">Time</label><span style="color: red !important; display: inline; float: none;">*</span>
                <p name="time" type="time" class="form-control" id="time"><?=$meetings->time?></p>
            </div>
            <div class="form-group col-md-6">
                <label for="title">Title</label><span style="color: red !important; display: inline; float: none;">*</span>
                <p name="title" type="text" class="form-control" id="title" ><?=$meetings->title?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="address_lat">Address(lat)</label>
            <input name="address_lat" type="hidden" class="form-control" id="address_lat" value="<?=$meetings->address_lat?>">
            <p name="address_lat_p" type="text" class="form-control" id="address_lat_p" ><?=$meetings->address_lat?></p>

        </div>
        <label for="address_lng">Address(lng)</label>
        <div class="form-group">
            <input name="address_lng" type="hidden" class="form-control" id="address_lng" value="<?=$meetings->address_lng?>">
            <p name="address_lng_p" type="text" class="form-control" id="address_lng_p"><?=$meetings->address_lng?></p>
        </div>
        <div class="form-group col-md-4">
            <label for="country">Country</label><span style="color: red !important; display: inline; float: none;">*</span>

            <select id="country" name="country" class="form-control">
                <option value="<?=$meetings->country?>"><?=$meetings->country?></option>
            </select>

        </div>

        <a href="/edit/<?=$meetings->id?>" class="btn btn-warning">Edit</a>
        <a href="/list" class="btn btn-danger" >Back</a>


    </form>
</div>
</body >
</html>