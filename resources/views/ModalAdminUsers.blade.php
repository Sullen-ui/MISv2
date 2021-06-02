<div class="modal fade" id="modalAdminUsers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 50%;">
        <div class="modal-content">
            <div class="modal-header"><h2>Пользователь</h2></div>
            <div class="modal-body">
                
                    <div class="container-fluid">
                       
                          <div class="row">
                            <div class="col-lg-3">
  
                                    <input class="n" type="text" id="user-login" name="Login" placeholder="Логин" autocomplete="off">
                                   

                               
                               
                            </div>
                            <div class="col-lg-5 mb-2"><input type="text" id="user-password" name="password" placeholder="Пароль" autocomplete="off"></div>
                            <div class="col-lg-4 mb-2">
                                <select id="type_role" name="type_user" required>
                                    <option disabled>Тип пользователя</option>
                                    <option value="1">Регистратор</option>
                                    <option value="2">Оператор</option>
                                    <option value="3">Врач</option>
                                    <option value="4">Администратор</option>
                               
                                </select>
                                </div>
                                <div class="col-lg-12 mb-2"><input type="text" id="user-branch" name="user-branch" placeholder="Отделение" autocomplete="off"></div>
                                <div class="col-lg-12 mb-2"><input class="blue" id="Add-user-btn" type="submit" value="Cохранить"></div>

                          </div>
             
            </div>
        </div>
    </div>
</div>
</div>