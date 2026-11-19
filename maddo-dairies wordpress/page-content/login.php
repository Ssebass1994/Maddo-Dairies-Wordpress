<header class="hero-section">
        <div class="hero-overlay">
            <div class="hero-content">
                <h1> Pure Freshness,Connected Community.</h1>
                <p class="breadcrumb">Welcome to Maddo Dairies' digital operational portal.<br> 
Connecting local dairy farmers, wholesale distributor networks, 
retailers, and staff in one seamless supply chain.<br><br>Latest Blogs & NewHome / News</p>
            </div>
        </div>
    </header>
    <br>
    <section>
<div class="login-card-content">
  
  <!-- Header & Role Description -->
  <div class="login-header">
    <span class="portal-badge" id="portalBadge">Farmer Portal</span>
    <h2 class="login-title">Welcome Back</h2>
    <p class="login-subtitle" id="portalDesc">
      Access milk collection records, daily ledger, and payout statements.
    </p>
  </div>

  <!-- Role Switcher Section -->
  <div class="role-selector-container">
    <label class="section-label">SELECT ACCESS PORTAL</label>
    
    <!-- Mobile Dropdown Selector (Visible on small screens) -->
    <div class="role-dropdown-wrapper">
      <select class="role-select-dropdown" id="roleDropdown" onchange="switchRole(this.value)">
        <option value="farmer">🚜 Farmers & Producers</option>
        <option value="retailer">🛒 Retailers & Supermarkets</option>
        <option value="wholesale">🚛 Wholesale Partners</option>
        <option value="vendor">📦 Vendors & Logistics</option>
        <option value="supplier">🌾 Feed & Equipment Suppliers</option>
        <option value="staff">💼 Internal Staff & Admin</option>
      </select>
    </div>

    <!-- Desktop Tabs Selector (Visible on desktop/tablets) -->
    <div class="role-tabs-grid" id="roleTabs">
      <button type="button" class="role-tab active" data-role="farmer" onclick="switchRole('farmer')">
        <span class="tab-icon">🚜</span>
        <span class="tab-text">Farmers</span>
      </button>

      <button type="button" class="role-tab" data-role="retailer" onclick="switchRole('retailer')">
        <span class="tab-icon">🛒</span>
        <span class="tab-text">Retailers</span>
      </button>

      <button type="button" class="role-tab" data-role="wholesale" onclick="switchRole('wholesale')">
        <span class="tab-icon">🚛</span>
        <span class="tab-text">Wholesale</span>
      </button>

      <button type="button" class="role-tab" data-role="vendor" onclick="switchRole('vendor')">
        <span class="tab-icon">📦</span>
        <span class="tab-text">Vendors</span>
      </button>

      <button type="button" class="role-tab" data-role="supplier" onclick="switchRole('supplier')">
        <span class="tab-icon">🌾</span>
        <span class="tab-text">Suppliers</span>
      </button>

      <button type="button" class="role-tab" data-role="staff" onclick="switchRole('staff')">
        <span class="tab-icon">💼</span>
        <span class="tab-text">Staff</span>
      </button>
    </div>
  </div>

  <!-- Sign In Form -->
  <form id="maddoLoginForm" class="login-form" method="post" action="<?php echo esc_url(wp_login_url()); ?>">
    
    <!-- Login Method Toggle (Email vs Phone) -->
    <div class="method-toggle-container">
      <button type="button" class="method-btn active" id="methodEmailBtn" onclick="setLoginMethod('email')">
        Email Address
      </button>
      <button type="button" class="method-btn" id="methodPhoneBtn" onclick="setLoginMethod('phone')">
        Phone Number
      </button>
    </div>

    <!-- Dynamic Credential Input -->
    <div class="form-group">
      <label for="loginIdentifier" id="identifierLabel" class="input-label">Email Address</label>
      <div class="input-wrapper">
        <span class="input-icon" id="identifierIcon">✉️</span>
        <input 
          type="email" 
          id="loginIdentifier" name="log" 
          class="form-control" 
          placeholder="e.g. farmer@maddodairies.com" 
          required 
        />
      </div>
    </div>

    <!-- Password Input -->
    <div class="form-group">
      <div class="label-row">
        <label for="loginPassword" class="input-label">Password</label>
        <a href="#forgot" class="forgot-link">Forgot Password?</a>
      </div>
      <div class="input-wrapper">
        <span class="input-icon">🔒</span>
        <input 
          type="password" 
          id="loginPassword" name="pwd" 
          class="form-control" 
          placeholder="••••••••••••" 
          required 
        />
        <button type="button" class="password-toggle" onclick="togglePasswordVisibility()">
          👁️
        </button>
      </div>
    </div>

    <!-- Remember Me Checkbox -->
    <div class="form-options">
      <label class="remember-me">
        <input type="checkbox" id="rememberMe" name="rememberme" value="forever" />
        <span>Remember my credentials</span>
      </label>
    </div>

    <input type="hidden" name="redirect_to" value="<?php echo esc_url(home_url('/')); ?>">
    <!-- Submit Button -->
    <button type="submit" class="btn-submit" id="submitBtn">
      <span>Sign In to Dashboard</span>
      <span class="btn-arrow">→</span>
    </button>
  </form>

</div>
</section>


    <!-- Main Content Section -->
    <main class="content-section">
        <div class="card-container">
            <!-- Card 1 -->
            <div class="card">
                <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/FARMERS.jpeg')); ?>" alt="Group photo">
            </div>
            <!-- Card 2 -->
            <div class="card">
                <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/MADDO 2.png')); ?>" alt="Cow in enclosure">
            </div>
            <!-- Card 3 -->
            <div class="card">
                <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/serving pupils.jpg')); ?>" alt="People outdoors">
            </div>
        </div>
    </main>


