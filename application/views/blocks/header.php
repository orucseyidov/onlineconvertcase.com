<body>
    
    <main>
        <div class="main">
            <header class="menu-header">
                <div class="container-fluid">
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="<?=base_url() ?>">
                    <img alt="Convert case" src="/assets/img/logo-dark.png">
                    <!-- Convert case -->
                  </a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="<?=base_url() ?>">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("about/") ?>">About</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?=base_url("faq/") ?>">Faq</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                          Dropdown
                        </a>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                      </li> -->
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="<?=base_url('search/') ?>">
                      <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search Tool</button>
                    </form>
                  </div>
                </nav>
                </div>
            </header>