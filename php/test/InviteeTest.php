<?php
namespace Io\Deepdivedylan\Invitersvp\Test;

use Io\Deepdivedylan\Invitersvp\Invitee;

// grab the project test parameters
require_once("InvitersvpTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/classes/autoload.php");

class InviteeTest extends InvitersvpTest {
	//---------------------------DEFAULT OBJECT-------------------------------//
	/**
	 * city of the invitee
	 * @var string $VALID_INVITEECITY
	 **/
	protected $VALID_INVITEECITY = "Burque";
	/**
	 * country of the invitee
	 * @var string $VALID_INVITEECOUNTRY
	 **/
	 protected $VALID_INVITEECOUNTRY = "US";
	/**
	 * email of the invitee
	 * @var string $VALID_INVITEEEMAIL
	 **/
	protected $VALID_INVITEEEMAIL = "arlo@senate.romulan";
	/**
	 * name of the invitee
	 * @var string $VALID_INVITEENAME
	 **/
	protected $VALID_INVITEENAME = "Senator Arlo";
	/**
	 * phone of the invitee
	 * @var string $VALID_INVITEEPHONE
	 **/
	protected $VALID_INVITEEPHONE = "+15055551212";
	/**
	 * state of the invitee
	 * @var string $VALID_INVITEESTATE
	 **/
	protected $VALID_INVITEESTATE = "NM";
	/**
	 * address line 1 of the invitee
	 * @var string $VALID_INVITEESTREET1
	 **/
	protected $VALID_INVITEESTREET1 = "3701 Carlisle Blvd NE";
	/**
	 * address line 2 of the invitee
	 * @var string $VALID_INVITEESTREET2
	 **/
	protected $VALID_INVITEESTREET2 = "Senator Arlo's Nap Chamber";
	/**
	 * ZIP code of the invitee
	 * @var string $VALID_INVITEEZIP
	 **/
	 protected $VALID_INVITEEZIP = "87110";

	//---------------------------SECOND OBJECT--------------------------------//
	/**
	 * city of the invitee
	 * @var string $VALID_INVITEECITY2
	 **/
	protected $VALID_INVITEECITY2 = "Los Lunas";
	/**
	 * country of the invitee
	 * @var string $VALID_INVITEECOUNTRY2
	 **/
	 protected $VALID_INVITEECOUNTRY2 = "MX";
	/**
	 * email of the invitee
	 * @var string $VALID_INVITEEEMAIL2
	 **/
	protected $VALID_INVITEEEMAIL2 = "simon@senate.romulan";
	/**
	 * name of the invitee
	 * @var string $VALID_INVITEENAME2
	 **/
	protected $VALID_INVITEENAME2 = "Praetor Si'mon";
	/**
	 * phone of the invitee
	 * @var string $VALID_INVITEEPHONE2
	 **/
	protected $VALID_INVITEEPHONE2 = "+18188675309";
	/**
	 * state of the invitee
	 * @var string $VALID_INVITEESTATE2
	 **/
	protected $VALID_INVITEESTATE2 = "CA";
	/**
	 * address line 1 of the invitee
	 * @var string $VALID_INVITEESTREET12
	 **/
	protected $VALID_INVITEESTREET12 = "9550 Haskell Ave";
	/**
	 * address line 2 of the invitee
	 * @var string $VALID_INVITEESTREET22
	 **/
	protected $VALID_INVITEESTREET22 = "Praetor Si'mon's Hall of Fuzzy";
	/**
	 * ZIP code of the invitee
	 * @var string $VALID_INVITEEZIP2
	 **/
	 protected $VALID_INVITEEZIP2 = "91343";

	//-------------------------GENERATED TOKENS-------------------------------//
	/**
	 * token of the invitee
	 * @var string $VALID_INVITEETOKEN
	 **/
	protected $VALID_INVITEETOKEN = null;
	/**
	 * token of the invitee
	 * @var string $VALID_INVITEETOKEN2
	 **/
	protected $VALID_INVITEETOKEN2 = null;

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();

		// calculate the tokens
		$this->VALID_INVITEETOKEN = bin2hex(random_bytes(16));
		$this->VALID_INVITEETOKEN2 = bin2hex(random_bytes(16));
	}


	/**
	 * test inserting a valid Invitee and verify that the actual mySQL data matches
	 **/
	public function testInsertValidInvitee() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("invitee");

		// create a new Invitee and insert to into mySQL
		$invitee = new Invitee(null, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoInvitee = Invitee::getInviteeByInviteeId($this->getPDO(), $invitee->getInviteeId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("invitee"));
		$this->assertEquals($pdoInvitee->getInviteeCity(), $this->VALID_INVITEECITY);
		$this->assertEquals($pdoInvitee->getInviteeCountry(), $this->VALID_INVITEECOUNTRY);
		$this->assertEquals($pdoInvitee->getInviteeEmail(), $this->VALID_INVITEEEMAIL);
		$this->assertEquals($pdoInvitee->getInviteeName(), $this->VALID_INVITEENAME);
		$this->assertEquals($pdoInvitee->getInviteePhone(), $this->VALID_INVITEEPHONE);
		$this->assertEquals($pdoInvitee->getInviteeState(), $this->VALID_INVITEESTATE);
		$this->assertEquals($pdoInvitee->getInviteeStreet1(), $this->VALID_INVITEESTREET1);
		$this->assertEquals($pdoInvitee->getInviteeStreet2(), $this->VALID_INVITEESTREET2);
		$this->assertEquals($pdoInvitee->getInviteeToken(), $this->VALID_INVITEETOKEN);
		$this->assertEquals($pdoInvitee->getInviteeZip(), $this->VALID_INVITEEZIP);
	}

	/**
	 * test inserting a Invitee that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidInvitee() {
		// create a Invitee with a non null invitee id and watch it fail
		$invitee = new Invitee(InvitersvpTest::INVALID_KEY, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->insert($this->getPDO());
	}

	/**
	 * test inserting an Invitee, editing it, and then updating it
	 **/
	public function testUpdateValidInvitee() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("invitee");

		// create a new Invitee and insert to into mySQL
		$invitee = new Invitee(null, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->insert($this->getPDO());

		// edit the Invitee and update it in mySQL
		$invitee->setInviteeCity($this->VALID_INVITEECITY2);
		$invitee->setInviteeCountry($this->VALID_INVITEECOUNTRY2);
		$invitee->setInviteeEmail($this->VALID_INVITEEEMAIL2);
		$invitee->setInviteeName($this->VALID_INVITEENAME2);
		$invitee->setInviteePhone($this->VALID_INVITEEPHONE2);
		$invitee->setInviteeState($this->VALID_INVITEESTATE2);
		$invitee->setInviteeStreet1($this->VALID_INVITEESTREET12);
		$invitee->setInviteeStreet2($this->VALID_INVITEESTREET22);
		$invitee->setInviteeToken($this->VALID_INVITEETOKEN2);
		$invitee->setInviteeZip($this->VALID_INVITEEZIP2);
		$invitee->update($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoInvitee = Invitee::getInviteeByInviteeId($this->getPDO(), $invitee->getInviteeId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("invitee"));
		$this->assertEquals($pdoInvitee->getInviteeCity(), $this->VALID_INVITEECITY2);
		$this->assertEquals($pdoInvitee->getInviteeCountry(), $this->VALID_INVITEECOUNTRY2);
		$this->assertEquals($pdoInvitee->getInviteeEmail(), $this->VALID_INVITEEEMAIL2);
		$this->assertEquals($pdoInvitee->getInviteeName(), $this->VALID_INVITEENAME2);
		$this->assertEquals($pdoInvitee->getInviteePhone(), $this->VALID_INVITEEPHONE2);
		$this->assertEquals($pdoInvitee->getInviteeState(), $this->VALID_INVITEESTATE2);
		$this->assertEquals($pdoInvitee->getInviteeStreet1(), $this->VALID_INVITEESTREET12);
		$this->assertEquals($pdoInvitee->getInviteeStreet2(), $this->VALID_INVITEESTREET22);
		$this->assertEquals($pdoInvitee->getInviteeToken(), $this->VALID_INVITEETOKEN2);
		$this->assertEquals($pdoInvitee->getInviteeZip(), $this->VALID_INVITEEZIP2);
	}

	/**
	 * test updating an Invitee that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testUpdateInvalidInvitee() {
		// create a Invitee with a non null invitee id and watch it fail
		$invitee = new Invitee(null, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->update($this->getPDO());
	}

	/**
	 * test creating an Invitee and deleting it
	 **/
	public function testDeleteValidInvitee() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("invitee");

		// create a new Invitee and insert to into mySQL
		$invitee = new Invitee(null, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->insert($this->getPDO());

		// delete the Invitee from mySQL
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("invitee"));
		$invitee->delete($this->getPDO());

		// grab the data from mySQL and enforce the Invitee does not exist
		$pdoInvitee = Invitee::getInviteeByInviteeId($this->getPDO(), $invitee->getInviteeId());
		$this->assertNull($pdoInvitee);
		$this->assertEquals($numRows, $this->getConnection()->getRowCount("invitee"));
	}

	/**
	 * test deleting an Invitee that does not exist
	 *
	 * @expectedException PDOException
	 **/
	public function testDeleteInvalidInvitee() {
		// create a Invitee with a non null invitee id and watch it fail
		$invitee = new Invitee(null, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->delete($this->getPDO());
	}

	/**
	 * test grabbing an Invitee by a token
	 **/
	public function testGetValidInviteeByInviteeToken() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("invitee");

		// create a new Invitee and insert to into mySQL
		$invitee = new Invitee(null, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoInvitee = Invitee::getInviteeByInviteeToken($this->getPDO(), $invitee->getInviteeToken());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("invitee"));
		$this->assertEquals($pdoInvitee->getInviteeCity(), $this->VALID_INVITEECITY);
		$this->assertEquals($pdoInvitee->getInviteeCountry(), $this->VALID_INVITEECOUNTRY);
		$this->assertEquals($pdoInvitee->getInviteeEmail(), $this->VALID_INVITEEEMAIL);
		$this->assertEquals($pdoInvitee->getInviteeName(), $this->VALID_INVITEENAME);
		$this->assertEquals($pdoInvitee->getInviteePhone(), $this->VALID_INVITEEPHONE);
		$this->assertEquals($pdoInvitee->getInviteeState(), $this->VALID_INVITEESTATE);
		$this->assertEquals($pdoInvitee->getInviteeStreet1(), $this->VALID_INVITEESTREET1);
		$this->assertEquals($pdoInvitee->getInviteeStreet2(), $this->VALID_INVITEESTREET2);
		$this->assertEquals($pdoInvitee->getInviteeToken(), $this->VALID_INVITEETOKEN);
		$this->assertEquals($pdoInvitee->getInviteeZip(), $this->VALID_INVITEEZIP);
	}

	/**
	 * test grabbing an Invitee by a token that does not exist
	 **/
	public function testGetInvalidInviteeByInviteeToken() {
		// grab an invitee by searching for a token that does not exist
		$invitee = Invitee::getInviteeByInviteeToken($this->getPDO(), "you will find nothing");
		$this->assertNull($invitee);
	}

	/**
	 * test grabbing all Invitees
	 **/
	public function testGetAllValidInvitees() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("invitee");

		// create a new Invitee and insert to into mySQL
		$invitee = new Invitee(null, $this->VALID_INVITEECITY, $this->VALID_INVITEECOUNTRY, $this->VALID_INVITEEEMAIL, $this->VALID_INVITEENAME, $this->VALID_INVITEEPHONE, $this->VALID_INVITEESTATE, $this->VALID_INVITEESTREET1, $this->VALID_INVITEESTREET2, $this->VALID_INVITEETOKEN, $this->VALID_INVITEEZIP);
		$invitee->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Invitee::getAllInvitees($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("invitee"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Io\\Deepdivedylan\\Invitersvp\\Invitee", $results);

		// grab the result from the array and validate it
		$pdoInvitee = $results[0];
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("invitee"));
		$this->assertEquals($pdoInvitee->getInviteeCity(), $this->VALID_INVITEECITY);
		$this->assertEquals($pdoInvitee->getInviteeCountry(), $this->VALID_INVITEECOUNTRY);
		$this->assertEquals($pdoInvitee->getInviteeEmail(), $this->VALID_INVITEEEMAIL);
		$this->assertEquals($pdoInvitee->getInviteeName(), $this->VALID_INVITEENAME);
		$this->assertEquals($pdoInvitee->getInviteePhone(), $this->VALID_INVITEEPHONE);
		$this->assertEquals($pdoInvitee->getInviteeState(), $this->VALID_INVITEESTATE);
		$this->assertEquals($pdoInvitee->getInviteeStreet1(), $this->VALID_INVITEESTREET1);
		$this->assertEquals($pdoInvitee->getInviteeStreet2(), $this->VALID_INVITEESTREET2);
		$this->assertEquals($pdoInvitee->getInviteeToken(), $this->VALID_INVITEETOKEN);
		$this->assertEquals($pdoInvitee->getInviteeZip(), $this->VALID_INVITEEZIP);
	}
}
