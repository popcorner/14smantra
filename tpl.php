<?php
/**
 * https://github.com/popcorner/14smantra
 * © 2018 popcorner
 */
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>唐韵七言</title>
        <meta name="description" content="一个可以将magnet磁力链接转换成两句诗的工具" />
        <meta name="keywords" content="唐韵七言,十四字真言,磁力链接,智能作诗,magnet转换成诗" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="card text-white bg-info mt-3">
                <div class="card-header">唐韵七言</div>
                <div class="card-body text-info bg-light">
                    <textarea id="pta" class="form-control" rows="3" placeholder="在此填写内容"></textarea>
                    <div class="row mt-3">
                        <div class="col">
                            <button id="pen" class="btn btn-success btn-block">一键生成诗</button>
                            <div class="alert alert-success mt-3">“当时我就念了两句诗…”</div>
                        </div>
                        <div class="col">
                            <button id="pde" class="btn btn-primary btn-block">解读这句诗</button>
                            <div class="alert alert-primary mt-3">“识得唔识得啊？”</div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <small>一个可以将磁力链接转换成两句诗的工具</small>
                        <small>&copy; 2018 popcorner</small>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
        <script src="main.js"></script>
    </body>
</html>