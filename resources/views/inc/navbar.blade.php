<nav class = "navbar navbar-inverse navbar-static-top">
    <div class = "horizontal-meniu col-lg-12">
        <div class = "container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <li class="mobile-logo"><a href="IRIS_ADMIN.pradzia">
                        <img src="https://resources.vdu.lt/pictures/vdu_web_design_logo.png" alt="Pagrindinis"/></a></li>
            </div>

            <ul class="collapse navbar-nav navbar-collapse list-inline main-menu collapse" id="myNavbar" aria-expanded="false" style="height:1px">


                <li class="normal-logo"> <a href="IRIS_ADMIN.pradzia">
                        <img src="https://resources.vdu.lt/pictures/vdu_web_design_logo.png" alt="Pagrindinis"/> </a></li>

                <li class="dropdown menu-item">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Sporto užsiėmimai </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown menu-item">
                            <a href="#" id="professorsManagement" onclick="location.href='{{ url('destytojai') }}'">Dėstytojai</a>
                            <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                        </li>
                        <li class="dropdown menu-item">
                            <a href="#" id="subjectManagement" onclick="location.href='{{ url('dalykai') }}'">Dalykai</a>
                            <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                        </li>

                        <li class="dropdown-menu-item">
                            <a href="#" id="reportsManagement" onclick="location.href='{{ url('ataskaitos') }}'">Ataskaitos</a>
                            <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                        </li>

                    </ul>
                </li>

                <li class="dropdown menu-item">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Menų kolektyviniai užsiėmimai </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown menu-item">
                            <a href="#" id="professorsManagement" onclick="menuAjax(this.id);">Dėstytojai</a>
                            <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                        </li>
                        <li class="dropdown menu-item">
                            <a href="#" id="subjectManagement_k" onclick="menuAjax(this.id);">Dalykai</a>
                            <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                        </li>

                        <li class="dropdown-menu-item">
                            <a href="#" id="reportsManagement_k" onclick="menuAjax(this.id);">Ataskaitos</a>
                            <img src="https://resources.vdu.lt/IRISfiles/pictures/default.svg" style="display:none;" id="loading">
                        </li>
                    </ul>
                </li>


            </ul>
            <ul class="nav navbar-nav list-inline main-menu navbar-right">
                <li class="menu-item">
                    <a  href="stud.menu?l=3&MN=GR"title="Grįžti į pagrindinį meniu"><i class="fa fa-home"></i> </a>
                </li>
            </ul>

        </div>
    </div>
</nav>