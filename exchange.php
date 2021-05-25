<div class="col-xl-12 col-lg-12">
  <div class="card shadow mb-12">
    <!-- Card Header - Dropdown -->
    <div class="container register">
                    <div class="row">
                        <div class="col-md-3 register-left">
                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                            <h3>ข้อมูลผู้ใช้งาน</h3>
                            <p>กรุณากรอกข้อมูลให้ถูกต้อง และครบถ้วน</p>

                        </div>
                        <div class="col-md-9 register-right">

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h3 class="register-heading">สำหรับ User</h3>
                                    <div class="row register-form">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="รหัสผนักงาน *" id="user_id" name="user_id" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Username *" id="username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password *" id="password" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control"  placeholder="Confirm Password *" id="conpass" name="conpass" />
                                            </div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                  <label> เพศ </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="male" checked>
                                                        <span> Male </span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="female">
                                                        <span>Female </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="maxl">
                                                  <label> คำนำหน้า </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="นาย" checked>
                                                        <span>นาย</span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="นางสาว">
                                                        <span>นางสาว</span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="นาง">
                                                        <span>นาง</span>
                                                    </label>
                                                </div>
                                                  <div class="form-group">

                                                <label>Start Date Work</label>
                                                <input name="start_work" type="date" id="start_work" placeholder="เลือกวันที่เริ่มงาน">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Name *" name="name" id="name" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="ชื่อ(ภาษาไทย) *" name="nameth" id="nameth" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="ชื่อเล่น *" name="fname" id="fname" />
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control">
                                                    <option class="hidden"  selected disabled>การศึกษา</option>
                                                    <option value="ป.6">ประถมศึกษา6</option>
                                                    <option value="ม.3">มัธยมศึกษา3</option>
                                                    <option value="ม.6">มัธยมศึกษา6</option>
                                                    <option value="ป.ตรี">ปริญญาตรี</option>
                                                    <option value="ป.โท">ปริญญาโท</option>
                                                    <option value="ป.เอก">ปริญญาเอก</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="สัญชาติ *" name="nationnality" id="nationnality" />
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="company" id="company">
                                                    <option class="hidden"  selected disabled>เลือกแผนก</option>
                                                    <option value="ac">Account</option>
                                                    <option value="pc">Purchase</option>
                                                    <option value="tech">Tech</option>
                                                    <option value="sale">Sale</option>
                                                    <option value="pd">Product</option>
                                                    <option value="qa">QA</option>
                                                    <option value="qc">QC</option>
                                                    <option value="ti">Ti</option>
                                                    <option value="rd">Rd</option>
                                                    <option value="ti">IT</option>
                                                    <option value="hr">Hr</option>
                                                    <option value="cs">CS</option>
                                                    <option value="lab">LAB</option>
                                                    <option value="wh">Warehouse</option>
                                                    <option value="dl">Delivery</option>

                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Surename *" name="surname" id="surname" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="นามสกุล(ภาษาไทย) *" name="surnameth" id="surnameth" />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="อายุ *" name="age" id="age  " />
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="kind_work" id="kind_work">
                                                    <option class="hidden"  selected disabled>ประเภทพนักงาน</option>
                                                    <option value="officer">Officer</option>
                                                    <option value="factory">Factory</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" name="company" id="company">
                                                    <option class="hidden"  selected disabled>บริษัท</option>
                                                    <option value="ntsc">NutritionSc</option>
                                                    <option value="nt">Nutrition</option>
                                                    <option value="nv">Nuevotec</option>
                                                    <option value="ntr">Nutrin</option>

                                                </select>
                                            </div>

                                    </div>
                                    <div class="col-md-12">
                                      <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">ที่อยู่</span>
                                      </div>
                                      <textarea class="form-control" aria-label="With textarea" name="address" id="address"></textarea>
                                    </div>
                                  </div>
                                    <div class="col-md-9">
                                      <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>

                            </div>
                        </div>
                    </div>

                </div>

    <!-- Card Body -->
    <div class="card-body">

    </div>
  </div>
</div>


<!-- Pie Chart -->

</div>
</br></br>

<!-- Content Row -->
<div class="row">

<!-- Content Column -->
<div class="col-lg-6 mb-4">

  <!-- Project Card Example -->


  <!-- Color System -->


</div>


</div>

</div>
