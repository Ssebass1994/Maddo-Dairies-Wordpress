// Role Configurations
const roleConfig = {
  farmer: { name: "Farmer Portal", desc: "Access milk collection records, daily ledger, and payout statements.", emailPlaceholder: "farmer@maddodairies.com", phonePlaceholder: "+256 700 000000" },
  retailer: { name: "Retailer Portal", desc: "Place daily dairy product orders, check stock, and manage invoices.", emailPlaceholder: "store@retailer.com", phonePlaceholder: "+256 700 000000" },
  wholesale: { name: "Wholesale Portal", desc: "Bulk milk orders, cold-chain scheduling, and contract management.", emailPlaceholder: "orders@distributor.com", phonePlaceholder: "+256 700 000000" },
  vendor: { name: "Vendor Portal", desc: "Route dispatch, delivery schedules, and fleet logistics tracking.", emailPlaceholder: "logistics@vendor.com", phonePlaceholder: "+256 700 000000" },
  supplier: { name: "Supplier Portal", desc: "Feed raw materials, packaging supply, and purchase order tracking.", emailPlaceholder: "supplies@partner.com", phonePlaceholder: "+256 700 000000" },
  staff: { name: "Internal Staff", desc: "Quality assurance, plant operations, HR, and administrative controls.", emailPlaceholder: "staff.id@maddodairies.com", phonePlaceholder: "+256 700 000000" }
};

let currentRole = 'farmer';
let currentMethod = 'email';

function switchRole(roleKey) {
  currentRole = roleKey;
  const config = roleConfig[roleKey];

  // Update Badge and Description
  document.getElementById('portalBadge').textContent = config.name;
  document.getElementById('portalDesc').textContent = config.desc;

  // Update Dropdown Sync
  document.getElementById('roleDropdown').value = roleKey;

  // Update Active Tab Styles
  document.querySelectorAll('.role-tab').forEach(tab => {
    tab.classList.toggle('active', tab.dataset.role === roleKey);
  });

  // Update Placeholder {

  const input = document.getElementById('loginIdentifier');
  input.placeholder = currentMethod === 'email' ? config.emailPlaceholder : config.phonePlaceholder;
}

function setLoginMethod(method) {
  currentMethod = method;
  const isEmail = method === 'email';

  document.getElementById('methodEmailBtn').classList.toggle('active', isEmail);
  document.getElementById('methodPhoneBtn').classList.toggle('active', !isEmail);

  const label = document.getElementById('identifierLabel');
  const icon = document.getElementById('identifierIcon');
  const input = document.getElementById('loginIdentifier');

  if (isEmail) {
    label.textContent = "Email Address";
    icon.textContent = "✉️";
    input.type = "email";
    input.placeholder = roleConfig[currentRole].emailPlaceholder;
  } else {
    label.textContent = "Phone Number";
    icon.textContent = "📞";
    input.type = "tel";
    input.placeholder = roleConfig[currentRole].phonePlaceholder;
  }
}

function togglePasswordVisibility () {
  const pwdInput = document.getElementById('loginPassword');
  pwdInput.type = pwdInput.type === 'password' ? 'text' : 'password';

}
