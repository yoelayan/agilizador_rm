<!-- content-wrapper start -->
<div class="content-wrapper">
    <div class="page-header flex-wrap">
        <div class="header-left"></div>
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <?= view('shared/modalform/modalform'); ?>
        </div>
    </div>
    <div class="row">
    <div class="col-sm-6 col-xl-5 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column border-bottom mb-4 pb-2">
                    <h4 class="font-weight-bold">
                        Estatus de mis propiedades
                    </h4>
                    <p>
                        Sigue de cerca los estatus de tus propiedades
                    </p>
                </div>
                <div class="d-flex border-bottom mb-4 pb-2">
                    <div class="hexagon">
                        <div class="hex-mid hexagon-success">
                            <i class="mdi mdi-clock-outline"></i>
                        </div>
                    </div>
                    <div class="pl-4">
                        <h4 class="font-weight-bold text-success mb-0"> 12 </h4>
                        <h6 class="text-muted">Propiedades aprobadas</h6>
                    </div>
                    </div>
                    <div class="d-flex border-bottom mb-4 pb-2">
                        <div class="hexagon">
                            <div class="hex-mid hexagon-warning">
                                <i class="mdi mdi-account-outline"></i>
                            </div>
                        </div>
                        <div class="pl-4">
                            <h4 class="font-weight-bold text-warning mb-0">34568</h4>
                            <h6 class="text-muted">Propiedades sin aprobar</h6>
                        </div>
                    </div>
                    <div class="d-flex border-bottom mb-4 pb-2">
                        <div class="hexagon">
                            <div class="hex-mid hexagon-danger">
                            <i class="mdi mdi-laptop-chromebook"></i>
                        </div>
                        </div>
                        <div class="pl-4">
                            <h4 class="font-weight-bold text-danger mb-0"> 3 </h4>
                            <h6 class="text-muted">Propiedades rechazadas</h6>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="hexagon">
                            <div class="hex-mid hexagon-dark">
                            <i class="mdi mdi-laptop-chromebook"></i>
                        </div>
                        </div>
                        <div class="pl-4">
                            <h4 class="font-weight-bold text-dark mb-0"> 3 </h4>
                            <h6 class="text-muted">Total de propiedades</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body pb-0">
                    <h4 class="card-title">
                        Top captadores
                    </h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table text-dark">
                        <thead class="bg-light">
                          <tr>
                            <th>Agente</th>
                            <th>Declaraciones</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img src="../assets/images/faces/face4.jpg" class="mr-2" alt="image" /> Leah Sherman </td>
                            <td>
                              <div class="d-flex">
                                <span class="pr-2 d-flex align-items-center">23%</span>
                                <select id="star-3" name="rating" autocomplete="off">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                            </td>
                            <td>2300</td>
                          </tr>
                          <tr>
                            <td>
                              <img src="../assets/images/faces/face5.jpg" class="mr-2" alt="image" /> Ina Curry </td>
                            <td>
                              <div class="d-flex">
                                <span class="pr-2 d-flex align-items-center">44%</span>
                                <select id="star-4" name="rating" autocomplete="off">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                            </td>
                            <td>53462</td>
                          </tr>
                          <tr>
                            <td>
                              <img src="../assets/images/faces/face7.jpg" class="mr-2" alt="image" /> Lida Fitzgerald </td>
                            <td>
                              <div class="d-flex">
                                <span class="pr-2 d-flex align-items-center">65%</span>
                                <select id="star-5" name="rating" autocomplete="off">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                            </td>
                            <td>67453</td>
                          </tr>
                          <tr>
                            <td>
                              <img src="../assets/images/faces/face2.jpg" class="mr-2" alt="image" /> Stella Johnson </td>
                            <td>
                              <div class="d-flex">
                                <span class="pr-2 d-flex align-items-center">49%</span>
                                <select id="star-6" name="rating" autocomplete="off">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                            </td>
                            <td>43662</td>
                          </tr>
                          <tr>
                            <td>
                              <img src="../assets/images/faces/face9.jpg" class="mr-2" alt="image" /> Maria Ortiz </td>
                            <td>
                              <div class="d-flex">
                                <span class="pr-2 d-flex align-items-center">65%</span>
                                <select id="star-7" name="rating" autocomplete="off">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                </select>
                              </div>
                            </td>
                            <td>76555</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-0">
        <div class="d-flex flex-column">
                    <h4 class="font-weight-bold">
                        Widgets de intercambio VES/USD
                    </h4>
                    <p>
                        El tipo de cambio del dólar oficial y dólar paralelo
                    </p>
                </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <!-- ExchangeMonitor.net Widget START -->
            <div class="exchangemonitor-widget-unique ve bcv w-100">
            <a class="exchangemonitor-widget-container" href="https://exchangemonitor.net/estadisticas/ve/bcv" target="_blank">
                <div class="exchangemonitor-widget-box"></div>
            </a>
            </div>
            <!-- ExchangeMonitor.net Widget END -->
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <!-- ExchangeMonitor.net Widget START -->
            <div class="exchangemonitor-widget-unique ve enparalelovzla w-100">
            <a class="exchangemonitor-widget-container" href="https://exchangemonitor.net/estadisticas/ve/enparalelovzla" target="_blank">
                <div class="exchangemonitor-widget-box"></div>
            </a>
            </div>
            <!-- ExchangeMonitor.net Widget END -->
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <!-- ExchangeMonitor.net Widget START -->
            <div class="exchangemonitor-widget-unique ve dolartoday w-100">
            <a class="exchangemonitor-widget-container" href="https://exchangemonitor.net/estadisticas/ve/dolartoday" target="_blank">
                <div class="exchangemonitor-widget-box"></div>
            </a>
            </div>
            <!-- ExchangeMonitor.net Widget END -->
        </div>
    </div>
</div>
<!-- content-wrapper ends -->