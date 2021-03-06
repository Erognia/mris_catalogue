<?php

namespace Mris\MrisCatalogue\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Richard Morgane
 *           Inthavixay Stéphane
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Mris\MrisCatalogue\Domain\Model\Marchand.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Richard Morgane 
 * @author Inthavixay Stéphane 
 */
class MarchandTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Mris\MrisCatalogue\Domain\Model\Marchand
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Mris\MrisCatalogue\Domain\Model\Marchand();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNomReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getNom()
		);
	}

	/**
	 * @test
	 */
	public function setNomForStringSetsNom()
	{
		$this->subject->setNom('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'nom',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSiteReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSite()
		);
	}

	/**
	 * @test
	 */
	public function setSiteForStringSetsSite()
	{
		$this->subject->setSite('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'site',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTelReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTel()
		);
	}

	/**
	 * @test
	 */
	public function setTelForStringSetsTel()
	{
		$this->subject->setTel('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'tel',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getImageReturnsInitialValueForFileReference()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForFileReferenceSetsImage()
	{
		$fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
		$this->subject->setImage($fileReferenceFixture);

		$this->assertAttributeEquals(
			$fileReferenceFixture,
			'image',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAdresseReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAdresse()
		);
	}

	/**
	 * @test
	 */
	public function setAdresseForStringSetsAdresse()
	{
		$this->subject->setAdresse('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'adresse',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCpReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getCp()
		);
	}

	/**
	 * @test
	 */
	public function setCpForStringSetsCp()
	{
		$this->subject->setCp('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'cp',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVilleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVille()
		);
	}

	/**
	 * @test
	 */
	public function setVilleForStringSetsVille()
	{
		$this->subject->setVille('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'ville',
			$this->subject
		);
	}
}
