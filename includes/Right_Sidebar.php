<div id="templatemo_content_right">
    <div class="templatemo_right_section">
        <h4>جستجو</h4>
        <div class="templatemo_right_section_content">
            <form method="get" action="results.php">
                <div class="control-group">
                <input name="user_query" type="text" id="keyword" style="width:140px" value="کلمه مورد نظر " class="form-control"/>
                <input type="submit" name="search" class="btn btn-success btn_search" value="جستجو" />
                </div>
            </form>
        </div>
    </div>

    <div class="templatemo_right_section">
        <h4>دسته بندی ها</h4>
        <div class="templatemo_right_section_content">
            <ul>
                <?PHP
                getCat()
                ?>
            </ul>
        </div>
    </div>

    <div class="templatemo_right_section">
        <h4>برند ها</h4>
        <div class="templatemo_right_section_content">
            <ul>
                <?PHP
                getBrands()
                ?>
            </ul>
        </div>
    </div>

    <div class="templatemo_right_section">
        <h4>W3C Validations</h4>
        <div class="templatemo_right_section_content">
            sayer
          </div>
    </div>
</div> <!-- end of content right-->
