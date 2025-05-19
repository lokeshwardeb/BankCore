<div class="flex-shrink-0 p-3" style="width: 280px;"> <a href="/"
        class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom"> <svg
            class="bi pe-none me-2" width="30" height="24" aria-hidden="true">
            <use xlink:href="#bootstrap"></use>
        </svg> <span class="fs-5 fw-semibold text-dark">Banking</span> <span class="fs-5 fw-semibold">Core</span> </a>
    <ul class="list-unstyled ps-0">

        <li class="mb-1"> <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Dashboard
            </button>
            <div class="collapse" id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="/dashboard" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a>
                    </li>
                    
                </ul>
            </div>
        </li>
        <li class="mb-1"> <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                Customer Management
            </button>
            <div class="collapse" id="orders-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="/add_new_customer" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Add New Customer</a></li>
                    <li><a href="/manage_customers" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Manage Customers</a>
                    </li>
                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Verify Customer KYC</a>
                    </li>
                    <!-- <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a>
                    </li>
                    <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a>
                    </li> -->
                </ul>
            </div>
        </li>
        <li class="mb-1"> <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                data-bs-toggle="collapse" data-bs-target="#ac_management" aria-expanded="false">
                Account Management
            </button>
            <div class="collapse" id="ac_management">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="/create_new_account" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Create new account</a></li>
                    <li><a href="/manage_accounts" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Manage Account</a>
                    </li>
                   
                </ul>
            </div>
        </li>
        <li class="mb-1"> <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                data-bs-toggle="collapse" data-bs-target="#transactions" aria-expanded="false">
                Transactions
            </button>
            <div class="collapse" id="transactions">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="/deposit" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Deposit To an account</a></li>
                    <li><a href="/withdraw" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Withdraw from an accout</a>
                    </li>
                    <li><a href="/transfer" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Transfer Money from one account to another account</a>
                    </li>
                    
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        
        
        <li class="mb-1"> <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                Admin Account
            </button>
            
            <div class="collapse" id="account-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="/logout" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Log
                            out</a></li>
                </ul>
            </div>
        </li>

        <li class="mb-1 mt-4">
            <div class="username text-primary fw-bold p-4 pt-0 pb-3"><?php echo $_SESSION['admin_username'] ?></div>
        </li>
    </ul>
</div>0