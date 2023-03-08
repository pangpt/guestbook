@extends('layouts.backend')

@section('content')
<!-- HEADER -->
      <div class="header">
        <div class="container-fluid">
          <!-- Body -->
          <div class="header-body">
            <div class="row align-items-end">
              <div class="col">
                <!-- Pretitle -->
                <h6 class="header-pretitle">Overview</h6>

                <!-- Title -->
                <h1 class="header-title">Dashboard</h1>
              </div>
              <div class="col-auto">
                <!-- Button -->
                <a href="#!" class="btn btn-primary lift"> Create Report </a>
              </div>
            </div>
            <!-- / .row -->
          </div>
          <!-- / .header-body -->
        </div>
      </div>
      <!-- / .header -->

      <!-- CARDS -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-6 col-xl">
            <!-- Value  -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">Value</h6>

                    <!-- Heading -->
                    <span class="h2 mb-0"> $24,500 </span>

                    <!-- Badge -->
                    <span class="badge badge-soft-success mt-n1"> +3.5% </span>
                  </div>
                  <div class="col-auto">
                    <!-- Icon -->
                    <span class="h2 fe fe-dollar-sign text-muted mb-0"></span>
                  </div>
                </div>
                <!-- / .row -->
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 col-xl">
            <!-- Hours -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">Total hours</h6>

                    <!-- Heading -->
                    <span class="h2 mb-0"> 763.5 </span>
                  </div>
                  <div class="col-auto">
                    <!-- Icon -->
                    <span class="h2 fe fe-briefcase text-muted mb-0"></span>
                  </div>
                </div>
                <!-- / .row -->
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 col-xl">
            <!-- Exit -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">Exit %</h6>

                    <!-- Heading -->
                    <span class="h2 mb-0"> 35.5% </span>
                  </div>
                  <div class="col-auto">
                    <!-- Chart -->
                    <div class="chart chart-sparkline">
                      <canvas class="chart-canvas" id="sparklineChart"></canvas>
                    </div>
                  </div>
                </div>
                <!-- / .row -->
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 col-xl">
            <!-- Time -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h6 class="text-uppercase text-muted mb-2">Avg. Time</h6>

                    <!-- Heading -->
                    <span class="h2 mb-0"> 2:37 </span>
                  </div>
                  <div class="col-auto">
                    <!-- Icon -->
                    <span class="h2 fe fe-clock text-muted mb-0"></span>
                  </div>
                </div>
                <!-- / .row -->
              </div>
            </div>
          </div>
        </div>
        <!-- / .row -->
        <div class="row">
          <div class="col-12 col-xl-8">
            <!-- Convertions -->
            <div class="card">
              <div class="card-header">
                <!-- Title -->
                <h4 class="card-header-title">Conversions</h4>

                <!-- Caption -->
                <span class="text-muted mr-3"> Last year comparision: </span>

                <!-- Switch -->
                <div class="custom-control custom-switch">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="cardToggle"
                    data-toggle="chart"
                    data-target="#conversionsChart"
                    data-trigger="change"
                    data-action="add"
                    data-dataset="1"
                  />
                  <label class="custom-control-label" for="cardToggle"></label>
                </div>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                  <canvas id="conversionsChart" class="chart-canvas"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-4">
            <!-- Traffic -->
            <div class="card">
              <div class="card-header">
                <!-- Title -->
                <h4 class="card-header-title">Traffic Channels</h4>

                <!-- Tabs -->
                <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                  <li
                    class="nav-item"
                    data-toggle="chart"
                    data-target="#trafficChart"
                    data-trigger="click"
                    data-action="toggle"
                    data-dataset="0"
                  >
                    <a href="#" class="nav-link active" data-toggle="tab">
                      All
                    </a>
                  </li>
                  <li
                    class="nav-item"
                    data-toggle="chart"
                    data-target="#trafficChart"
                    data-trigger="click"
                    data-action="toggle"
                    data-dataset="1"
                  >
                    <a href="#" class="nav-link" data-toggle="tab"> Direct </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart chart-appended">
                  <canvas
                    id="trafficChart"
                    class="chart-canvas"
                    data-toggle="legend"
                    data-target="#trafficChartLegend"
                  ></canvas>
                </div>

                <!-- Legend -->
                <div id="trafficChartLegend" class="chart-legend"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- / .row -->
        <div class="row">
          <div class="col-12 col-xl-4">
            <!-- Projects -->
            <div class="card card-fill">
              <div class="card-header">
                <!-- Title -->
                <h4 class="card-header-title">Projects</h4>

                <!-- Link -->
                <a href="project-overview.html" class="small">View all</a>
              </div>
              <div class="card-body">
                <!-- List group -->
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <a
                          href="project-overview.html"
                          class="avatar avatar-4by3"
                        >
                          <img
                            src="assets/img/avatars/projects/project-1.jpg"
                            alt="..."
                            class="avatar-img rounded"
                          />
                        </a>
                      </div>
                      <div class="col ml-n2">
                        <!-- Title -->
                        <h4 class="mb-1">
                          <a href="project-overview.html">Homepage Redesign</a>
                        </h4>

                        <!-- Time -->
                        <p class="card-text small text-muted">
                          <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>
                      </div>
                      <div class="col-auto">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <a
                          href="project-overview.html"
                          class="avatar avatar-4by3"
                        >
                          <img
                            src="assets/img/avatars/projects/project-2.jpg"
                            alt="..."
                            class="avatar-img rounded"
                          />
                        </a>
                      </div>
                      <div class="col ml-n2">
                        <!-- Title -->
                        <h4 class="mb-1">
                          <a href="project-overview.html">Travels & Time</a>
                        </h4>

                        <!-- Time -->
                        <p class="card-text small text-muted">
                          <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>
                      </div>
                      <div class="col-auto">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <a
                          href="project-overview.html"
                          class="avatar avatar-4by3"
                        >
                          <img
                            src="assets/img/avatars/projects/project-3.jpg"
                            alt="..."
                            class="avatar-img rounded"
                          />
                        </a>
                      </div>
                      <div class="col ml-n2">
                        <!-- Title -->
                        <h4 class="mb-1">
                          <a href="project-overview.html">Safari Exploration</a>
                        </h4>

                        <!-- Time -->
                        <p class="card-text small text-muted">
                          <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>
                      </div>
                      <div class="col-auto">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                  <div class="list-group-item">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <a
                          href="project-overview.html"
                          class="avatar avatar-4by3"
                        >
                          <img
                            src="assets/img/avatars/projects/project-5.jpg"
                            alt="..."
                            class="avatar-img rounded"
                          />
                        </a>
                      </div>
                      <div class="col ml-n2">
                        <!-- Title -->
                        <h4 class="mb-1">
                          <a href="project-overview.html">Personal Site</a>
                        </h4>

                        <!-- Time -->
                        <p class="card-text small text-muted">
                          <time datetime="2018-05-24">Updated 4hr ago</time>
                        </p>
                      </div>
                      <div class="col-auto">
                        <!-- Dropdown -->
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                </div>
              </div>
              <!-- / .card-body -->
            </div>
            <!-- / .card -->
          </div>
          <div class="col-12 col-xl-8">
            <!-- Sales -->
            <div class="card">
              <div class="card-header">
                <!-- Title -->
                <h4 class="card-header-title">Sales</h4>

                <!-- Nav -->
                <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                  <li
                    class="nav-item"
                    data-toggle="chart"
                    data-target="#salesChart"
                    data-trigger="click"
                    data-action="toggle"
                    data-dataset="0"
                  >
                    <a class="nav-link active" href="#" data-toggle="tab">
                      All
                    </a>
                  </li>
                  <li
                    class="nav-item"
                    data-toggle="chart"
                    data-target="#salesChart"
                    data-trigger="click"
                    data-action="toggle"
                    data-dataset="1"
                  >
                    <a class="nav-link" href="#" data-toggle="tab"> Direct </a>
                  </li>
                  <li
                    class="nav-item"
                    data-toggle="chart"
                    data-target="#salesChart"
                    data-trigger="click"
                    data-action="toggle"
                    data-dataset="2"
                  >
                    <a class="nav-link" href="#" data-toggle="tab"> Organic </a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <!-- Chart -->
                <div class="chart">
                  <canvas id="salesChart" class="chart-canvas"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- / .row -->
        <div class="row">
          <div class="col-12">
            <!-- Goals -->
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">Goals</h4>
                  </div>
                  <div class="col-auto">
                    <!-- Button -->
                    <a href="#!" class="btn btn-sm btn-white"> Export </a>
                  </div>
                </div>
                <!-- / .row -->
              </div>
              <div
                class="table-responsive mb-0"
                data-list='{"valueNames": ["goal-project", "goal-status", "goal-progress", "goal-date"]}'
              >
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <a
                          href="#"
                          class="text-muted list-sort"
                          data-sort="goal-project"
                        >
                          Goal
                        </a>
                      </th>
                      <th>
                        <a
                          href="#"
                          class="text-muted list-sort"
                          data-sort="goal-status"
                        >
                          Status
                        </a>
                      </th>
                      <th>
                        <a
                          href="#"
                          class="text-muted list-sort"
                          data-sort="goal-progress"
                        >
                          Progress
                        </a>
                      </th>
                      <th>
                        <a
                          href="#"
                          class="text-muted list-sort"
                          data-sort="goal-date"
                        >
                          Due date
                        </a>
                      </th>
                      <th class="text-right">Team</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <tr>
                      <td class="goal-project">Update the API</td>
                      <td class="goal-status">
                        <span class="text-warning">●</span> In progress
                      </td>
                      <td class="goal-progress">55%</td>
                      <td class="goal-date">
                        <time datetime="2018-10-24">07/24/18</time>
                      </td>
                      <td class="text-right">
                        <div class="avatar-group">
                          <a
                            href="profile-posts.html"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Dianna Smiley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-1.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="profile-posts.html"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Ab Hadley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-2.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="profile-posts.html"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Adolfo Hess"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-3.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="profile-posts.html"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Daniela Dewitt"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-4.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="goal-project">Release v1.2-Beta</td>
                      <td class="goal-status">
                        <span class="text-warning">●</span> In progress
                      </td>
                      <td class="goal-progress">25%</td>
                      <td class="goal-date">
                        <time datetime="2018-10-24">08/26/18</time>
                      </td>
                      <td class="text-right">
                        <div class="avatar-group justify-content-end">
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Dianna Smiley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-1.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Ab Hadley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-2.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Adolfo Hess"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-3.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="goal-project">GDPR Compliance</td>
                      <td class="goal-status">
                        <span class="text-success">●</span> Completed
                      </td>
                      <td class="goal-progress">100%</td>
                      <td class="goal-date">
                        <time datetime="2018-10-24">06/19/18</time>
                      </td>
                      <td class="text-right">
                        <div class="avatar-group justify-content-end">
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Dianna Smiley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-1.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Ab Hadley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-2.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Adolfo Hess"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-3.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="goal-project">v1.2 Documentation</td>
                      <td class="goal-status">
                        <span class="text-danger">●</span> Cancelled
                      </td>
                      <td class="goal-progress">0%</td>
                      <td class="goal-date">
                        <time datetime="2018-10-24">06/25/18</time>
                      </td>
                      <td class="text-right">
                        <div class="avatar-group justify-content-end">
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Dianna Smiley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-1.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Ab Hadley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-2.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <span class="fe fe-more-vertical"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="goal-project">Plan design offsite</td>
                      <td class="goal-status">
                        <span class="text-success">●</span> Completed
                      </td>
                      <td class="goal-progress">100%</td>
                      <td class="goal-date">
                        <time datetime="2018-10-24">06/30/18</time>
                      </td>
                      <td class="text-right">
                        <div class="avatar-group justify-content-end">
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Dianna Smiley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-1.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Ab Hadley"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-2.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Adolfo Hess"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-3.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                          <a
                            href="#!"
                            class="avatar avatar-xs"
                            data-toggle="tooltip"
                            title=""
                            data-original-title="Daniela Dewitt"
                          >
                            <img
                              src="assets/img/avatars/profiles/avatar-4.jpg"
                              class="avatar-img rounded-circle"
                              alt="..."
                            />
                          </a>
                        </div>
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a
                            href="#"
                            class="dropdown-ellipses dropdown-toggle"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item"> Action </a>
                            <a href="#!" class="dropdown-item">
                              Another action
                            </a>
                            <a href="#!" class="dropdown-item">
                              Something else here
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- / .row -->
        <div class="row">
          <div class="col-12 col-xl-5">
            <!-- Activity -->
            <div class="card card-fill">
              <div class="card-header">
                <!-- Title -->
                <h4 class="card-header-title">Recent Activity</h4>

                <!-- Button -->
                <a class="small" href="#!">View all</a>
              </div>
              <div class="card-body">
                <!-- List group -->
                <div
                  class="list-group list-group-flush list-group-activity my-n3"
                >
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-online">
                          <img
                            class="avatar-img rounded-circle"
                            src="assets/img/avatars/profiles/avatar-1.jpg"
                            alt="..."
                          />
                        </div>
                      </div>
                      <div class="col ml-n2">
                        <!-- Heading -->
                        <h5 class="mb-1">Dianna Smiley</h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Uploaded the files "Launchday Logo" and "New Design".
                        </p>

                        <!-- Time -->
                        <small class="text-muted"> 2m ago </small>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-online">
                          <img
                            class="avatar-img rounded-circle"
                            src="assets/img/avatars/profiles/avatar-2.jpg"
                            alt="..."
                          />
                        </div>
                      </div>
                      <div class="col ml-n2">
                        <!-- Heading -->
                        <h5 class="mb-1">Ab Hadley</h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Shared the "Why Dashkit?" post with 124 subscribers.
                        </p>

                        <!-- Time -->
                        <small class="text-muted"> 1h ago </small>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <div class="avatar avatar-sm avatar-offline">
                          <img
                            class="avatar-img rounded-circle"
                            src="assets/img/avatars/profiles/avatar-3.jpg"
                            alt="..."
                          />
                        </div>
                      </div>
                      <div class="col ml-n2">
                        <!-- Heading -->
                        <h5 class="mb-1">Adolfo Hess</h5>

                        <!-- Text -->
                        <p class="small text-gray-700 mb-0">
                          Exported sales data from Launchday's subscriber data.
                        </p>

                        <!-- Time -->
                        <small class="text-muted"> 3h ago </small>
                      </div>
                    </div>
                    <!-- / .row -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-7">
            <!-- Checklist -->
            <div class="card">
              <div class="card-header">
                <!-- Title -->
                <h4 class="card-header-title">Scratchpad Checklist</h4>

                <!-- Badge -->
                <span class="badge badge-soft-secondary"> 23 Archived </span>
              </div>
              <div class="card-body">
                <!-- Checklist -->
                <div class="checklist">
                  <div class="custom-control custom-checkbox checklist-control">
                    <input
                      class="custom-control-input"
                      id="checklistOne"
                      type="checkbox"
                    />
                    <label
                      class="custom-control-label"
                      for="checklistOne"
                    ></label>
                    <span class="custom-control-caption">
                      Delete the old mess in functions files.
                    </span>
                  </div>
                  <div class="custom-control custom-checkbox checklist-control">
                    <input
                      class="custom-control-input"
                      id="checklistTwo"
                      type="checkbox"
                    />
                    <label
                      class="custom-control-label"
                      for="checklistTwo"
                    ></label>
                    <span class="custom-control-caption">
                      Refactor the core social sharing modules
                    </span>
                  </div>
                  <div class="custom-control custom-checkbox checklist-control">
                    <input
                      class="custom-control-input"
                      id="checklistThree"
                      type="checkbox"
                    />
                    <label
                      class="custom-control-label"
                      for="checklistThree"
                    ></label>
                    <span class="custom-control-caption">
                      Create the release notes for the new pages so customers
                      get psyched.
                    </span>
                  </div>
                  <div class="custom-control custom-checkbox checklist-control">
                    <input
                      class="custom-control-input"
                      id="checklistFour"
                      type="checkbox"
                    />
                    <label
                      class="custom-control-label"
                      for="checklistFour"
                    ></label>
                    <span class="custom-control-caption">
                      Send Dianna those meeting notes
                    </span>
                  </div>
                  <div class="custom-control custom-checkbox checklist-control">
                    <input
                      class="custom-control-input"
                      id="checklistFive"
                      type="checkbox"
                    />
                    <label
                      class="custom-control-label"
                      for="checklistFive"
                    ></label>
                    <span class="custom-control-caption">
                      Share the documentation for the new unified API
                    </span>
                  </div>
                  <div class="custom-control custom-checkbox checklist-control">
                    <input
                      class="custom-control-input"
                      id="checklistSix"
                      type="checkbox"
                      checked
                    />
                    <label
                      class="custom-control-label"
                      for="checklistSix"
                    ></label>
                    <span class="custom-control-caption">
                      Clean up the Figma file with all of the avatars, buttons,
                      and other components.
                    </span>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row align-items-center">
                  <div class="col">
                    <!-- Input -->
                    <textarea
                      class="form-control form-control-flush form-control-auto"
                      data-toggle="autosize"
                      rows="1"
                      placeholder="Create a task"
                    ></textarea>
                  </div>
                  <div class="col-auto">
                    <!-- Button -->
                    <button class="btn btn-sm btn-primary">Add</button>
                  </div>
                </div>
                <!-- / .row -->
              </div>
            </div>
          </div>
        </div>
        <!-- / .row -->
      </div>
@endsection