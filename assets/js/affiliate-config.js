const Affiliate = window.Affiliate;
const AffiliatePluginAmazon = window.AffiliatePluginAmazon;

let amazonAff = AffiliatePluginAmazon(Affiliate, {
  tags: {
    us: 'digmypants01-20', // for USA, required
    gb: '', // for UK
    de: '', // for Germany
    fr: '', // for France
    jp: '', // for Japan
    ca: '', // for Canada
    cn: '', // for China
    it: '', // for Italy
    es: 'digmypants-21', // for Spain
    in: '', // for India
    br: '', // for Brazil
    mx: '', // for Mexico
  },
  debug: false, // verbose logging into the console, default off
  locale: null, // manually set the country code of the browser, default automatic
  modifyDomain: true, // modify domains like amazon.com to amazon.co.uk based on locale, default on
});

// amazonAff is now an Affiliate instance
amazonAff.attach(); // this will start affiliation
