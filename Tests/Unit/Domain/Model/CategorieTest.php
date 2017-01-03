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
 * Test case for class \Mris\MrisCatalogue\Domain\Model\Categorie.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Richard Morgane 
 * @author Inthavixay Stéphane 
 */
class CategorieTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Mris\MrisCatalogue\Domain\Model\Categorie
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Mris\MrisCatalogue\Domain\Model\Categorie();
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
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
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
	public function getParentReturnsInitialValueForCategorie()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getParent()
		);
	}

	/**
	 * @test
	 */
	public function setParentForObjectStorageContainingCategorieSetsParent()
	{
		$parent = new \Mris\MrisCatalogue\Domain\Model\Categorie();
		$objectStorageHoldingExactlyOneParent = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneParent->attach($parent);
		$this->subject->setParent($objectStorageHoldingExactlyOneParent);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneParent,
			'parent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addParentToObjectStorageHoldingParent()
	{
		$parent = new \Mris\MrisCatalogue\Domain\Model\Categorie();
		$parentObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$parentObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($parent));
		$this->inject($this->subject, 'parent', $parentObjectStorageMock);

		$this->subject->addParent($parent);
	}

	/**
	 * @test
	 */
	public function removeParentFromObjectStorageHoldingParent()
	{
		$parent = new \Mris\MrisCatalogue\Domain\Model\Categorie();
		$parentObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$parentObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($parent));
		$this->inject($this->subject, 'parent', $parentObjectStorageMock);

		$this->subject->removeParent($parent);

	}
}
